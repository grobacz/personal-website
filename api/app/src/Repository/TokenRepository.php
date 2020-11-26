<?php

namespace App\Repository;

use App\Entity\Contact;
use App\Entity\Token;
use Cycle\ORM\Select;

class TokenRepository extends Select\Repository
{
    public function getLastToken(Contact $contact): ?Token
    {
        /** @var ?Token $token */
        $token = $this->select()->where('contact_id', '=', $contact->getId())->orderBy('validUntil','DESC')->fetchOne();
        return $token;
    }
}
