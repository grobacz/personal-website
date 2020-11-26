<?php declare(strict_types=1);

namespace App\Security\Auth\Session;

use Spiral\Auth\Exception\TokenStorageException;
use Spiral\Auth\TokenInterface;
use Spiral\Auth\TokenStorageInterface;

final class TokenStorage implements TokenStorageInterface
{

    /**
     * Load token by id, must return null if token not found.
     *
     * @param string $id
     * @return TokenInterface|null
     *
     * @throws TokenStorageException
     */
    public function load(string $id): ?TokenInterface
    {
        // TODO: Implement load() method.
    }

    /**
     * Create token based on the payload provided by actor provider.
     *
     * @param array $payload
     * @param \DateTimeInterface|null $expiresAt
     * @return TokenInterface
     *
     * @throws TokenStorageException
     */
    public function create(array $payload, \DateTimeInterface $expiresAt = null): TokenInterface
    {
        return new Token();
    }

    /**
     * Delete token from the persistent storage.
     *
     * @param TokenInterface $token
     *
     * @throws TokenStorageException
     */
    public function delete(TokenInterface $token): void
    {
        // TODO: Implement delete() method.
    }
}
