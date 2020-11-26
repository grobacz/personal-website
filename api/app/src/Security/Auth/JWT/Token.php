<?php declare(strict_types=1);

namespace App\Security\Auth\Session;

use Spiral\Auth\TokenInterface;

final class Token implements TokenInterface
{
    /**
     * @return string
     */
    public function getID(): string
    {
        return '';
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getExpiresAt(): ?\DateTimeInterface
    {
        return new \DateTimeImmutable();
    }

    /**
     * Actor provider specific payload.
     *
     * @return array
     */
    public function getPayload(): array
    {
        return [];
    }
}
