<?php declare(strict_types=1);

namespace App\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Core\Container;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class DependencyBootloader extends Bootloader
{
    public function boot(Container $container)
    {
        $container->bindSingleton(SerializerInterface::class, fn() => new Serializer(
            [new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer()],
            [new \Symfony\Component\Serializer\Encoder\JsonEncoder()]
        ));
    }
}
