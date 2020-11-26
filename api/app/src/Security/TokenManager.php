<?php

namespace App\Security;

use Ahc\Jwt\JWT;
use App\Entity\Contact;
use Cycle\ORM\ORMInterface;

class TokenManager
{
    private string $key;
    /**
     * @var ORMInterface
     */
    private ORMInterface $orm;

    public function __construct(string $key, ORMInterface $orm)
    {
        $this->key = $key;
        $this->orm = $orm;
    }

    // todo: TokenData
    public function generate(TokenData $data): string
    {
        $jwt = new JWT($this->key, 'RS256');
        return $jwt->encode($data->toArray());
    }
    
    // todo: TokenData
    public function unpack(string $token): TokenData
    {
        $jwt = new JWT($this->key, 'RS256');
        $tokenData = $jwt->decode($token);
        /** @var Contact $contact */
        $contact =$this->orm->getRepository(Contact::class)->findByPK($tokenData['contact']); 
        return new TokenData($tokenData['hash'], $contact);
    }
}