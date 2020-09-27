<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Job\Ping;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;
use Spiral\Prototype\Traits\PrototypeTrait;
use Symfony\Component\Serializer\SerializerInterface;
use Spiral\Views\ViewsInterface;
use Spiral\Jobs\QueueInterface;

class HomeController
{
    use PrototypeTrait;
    /** @var ViewsInterface */
    private $views;
    /** @var QueueInterface */
    private $queue;
    /**
     * @param ViewsInterface $views
     * @param QueueInterface $queue
     */
    public function __construct(ViewsInterface $views, QueueInterface $queue)
    {
        $this->queue = $queue;
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function index(): string
    {
        return $this->views->render('default.php');
    }

    /**
     * @return string
     */
    public function save(Transaction $transaction): string
    {
        $user = new User();
        $user->setName('admin');
        $transaction->persist($user);
        $transaction->run();
        return "saved";
    }

    /**
     * @return string
     */
    public function list(ORM $orm, SerializerInterface $serializer): string
    {
        $users = $orm->getRepository(User::class)->findAll();
        return $serializer->serialize($users, 'json');
    }

    /**
     * Example of exception page.
     */
    public function exception(): void
    {
        echo $undefined;
    }

    /**
     * @return string
     */
    public function ping(): string
    {
        $jobID = $this->queue->push(
            Ping::class,
            ['value' => 'hello world']
        );

        return sprintf('Job ID: %s', $jobID);
    }
}
