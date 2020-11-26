<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

namespace App\Bootloader;

use App\Security\ApiKeyFirewall;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Router\Route;
use Spiral\Router\RouterInterface;
use Spiral\Router\Target\Namespaced;

class RoutesBootloader extends Bootloader
{
    public function boot(RouterInterface $router, ApiKeyFirewall $firewallMiddleware): void
    {
        // handle all /controller/action like urls
        $route = new Route(
            '/<controller>[/<id>]/<action>',
            new Namespaced('App\\Controller')
        );
        
        $router->setDefault($route->withDefaults([
            'controller' => 'home',
            'action'     => 'index'
        ])->withMiddleware(
            $firewallMiddleware
        ));
    }
}
