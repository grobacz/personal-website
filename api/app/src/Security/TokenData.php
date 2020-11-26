<?php

namespace App\Security;

use App\Entity\Contact;

class TokenData
{
    private string $hash;
    private ?Contact $contact;

    public function __construct(string $hash, ?Contact $contact)
    {
        $this->hash = $hash;
        $this->contact = $contact;
    }
    
    public function toArray(): array
    {
        return [
            'hash' => $this->hash,
            'contact' => $this->contact ? $this->contact->getId() : null,
        ];
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }
}