<?php declare(strict_types=1);

namespace App\Bootloader;

use App\Security\ApiKeyFirewall;
use App\Security\TokenManager;
use Cycle\ORM\ORMInterface;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Boot\EnvironmentInterface;
use Spiral\Core\Container;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class DependencyBootloader extends Bootloader
{
    protected const BINDINGS = [];

    protected const SINGLETONS = [];

    protected const DEPENDENCIES = [];
    
    public function boot(Container $container, EnvironmentInterface $env, ORMInterface $orm)
    {
        $container->bindSingleton(SerializerInterface::class, fn() => new Serializer(
            [new ObjectNormalizer()],
            [new JsonEncoder()]
        ));
        $container->bindSingleton(TokenManager::class, fn() => new TokenManager(
            $env->get('ENCRYPTER_KEY'),
            $orm
        ));
    }
}
