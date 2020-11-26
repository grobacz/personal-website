<?php declare(strict_types=1);

namespace App\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

/**
 * @Entity
 */
class Meeting
{
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="datetime")
     * @var \DateTimeInterface
     */
    protected $date;

    /**
     * @Column(type="text")
     * @var string
     */
    protected $description;

    /**
     * @BelongsTo(target="Contact")
     * @var Contact
     */
    protected $contact;

    /**
     * @Column(type="boolean")
     * @var bool
     */
    protected $isAccepted;

    /**
     * @Column(type="datetime")
     * @var \DateTimeInterface
     */
    protected $createdAt;
    
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->isAccepted = false;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }
    
    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
    }
    
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function isAccepted(): bool
    {
        return $this->isAccepted;
    }

    public function setIsAccepted(bool $isAccepted): void
    {
        $this->isAccepted = $isAccepted;
    }
}
