<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Meeting;
use App\Entity\Token;
use App\Repository\TokenRepository;
use App\Security\TokenManager;
use Cycle\ORM\Transaction;
use Psr\Http\Message\ServerRequestInterface;
use Spiral\Core\Container\SingletonInterface;
use Spiral\Http\Exception\ClientException\BadRequestException;
use Spiral\Http\Exception\ClientException\NotFoundException;
use Spiral\Prototype\Traits\PrototypeTrait;
use Symfony\Component\Serializer\SerializerInterface;

class MeetingController implements SingletonInterface
{
    use PrototypeTrait;

    private SerializerInterface $serializer;
    private Transaction $transaction;
    private TokenManager $tokenManager;
    private TokenRepository $tokenRepository;

    public function __construct(
        SerializerInterface $serializer,
        Transaction $transaction,
        TokenManager $tokenManager,
        TokenRepository $tokenRepository
    ) {
        $this->serializer = $serializer;
        $this->transaction = $transaction;
        $this->tokenManager = $tokenManager;
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * @return string
     */
    public function create(
        ServerRequestInterface $request
    ): string {
        $meetingData = $request->getParsedBody();
        if (!$meetingData) {
            throw new BadRequestException("Missing meeting data");
        }
        // todo: $meetingData validation
        $contact = null;
        if ($token = $request->getHeader('token')[0] ?? null) {
            $contact = $this->tokenManager->unpack($token)->getContact();
        }
        if (!empty($meetingData['contact'])) {
            $contact = new Contact();
            $contact->setName($meetingData['contact']['name']);
        }
        $meeting = new Meeting();
        $meeting->setDate(new \DateTimeImmutable($meetingData['date']));
        $meeting->setDescription($meetingData['description']);
        $meeting->setContact($contact);
        $this->transaction->persist($meeting, Transaction::MODE_CASCADE);
        $this->transaction->run();
        return $this->serializer->serialize($meeting, 'json');
    }
    
    public function confirm(string $id)
    {
        //todo: sprawdzanie czy jest adminem
        if ($id) {
            /** @var Meeting $meeting */
            $meeting = $this->orm->getRepository(Meeting::class)->findByPK($id);
        }
        if (!$id || !$meeting) {
            throw new NotFoundException('Meeting not found');
        }
        
        if ($meeting->isAccepted()) {
            throw new BadRequestException('Already accepted');
        }
        
        $meeting->setIsAccepted(true);
        $this->transaction->persist($meeting);
        // nie działa a powinno, custom repo jest zmapowane w encji
        $token = $this->tokenRepository->getLastToken($meeting->getContact());
//        // todo: wybierać ostatnie, nie pierwsze/losowe
//        $token = $this->orm->getRepository(Token::class)->findOne([
//            'contact_id' => $meeting->getContact()->getId(),
//        ]);
        if (!$token) {
            $token = new Token();
            $token->setContact($meeting->getContact());
            $token->generateHash();
        }
        $token->setValidUntil((new \DateTimeImmutable())
            ->setTimestamp($meeting->getDate()->getTimestamp())
            ->setTime(0, 0, 0)
            ->modify('+1day'));
        $this->transaction->persist($token);
        
        $this->transaction->run();
    }
}
