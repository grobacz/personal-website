<?php declare(strict_types=1);

namespace App\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

/**
 * @Entity(repository="App\Repository\TokenRepository")
 */
class Token
{
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="date")
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @Column(type="date")
     * @var \DateTimeInterface
     */
    protected $validUntil;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $hash;

    /**
     * @BelongsTo(target="Contact")
     * @var Contact
     */
    protected $contact;
    
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function generateHash(): void
    {
        if ($this->hash) {
            new \LogicException('Cannot change hash for token');
        }
        if (!$this->contact) {
            new \LogicException('Set contact before generating hash');
        }
        $this->hash = substr(md5(uniqid($this->contact->getName() . $this->createdAt->getTimestamp(), true)), 0, 15);
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getValidUntil(): \DateTimeInterface
    {
        return $this->validUntil;
    }

    /**
     * @param \DateTimeInterface $validUntil
     */
    public function setValidUntil(\DateTimeInterface $validUntil): void
    {
        $this->validUntil = $validUntil;
    }
}
