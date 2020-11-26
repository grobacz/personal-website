<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Kairee Wu (krwu)
 */

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Http\Message\ResponseInterface;
use Spiral\Boot\AbstractKernel;
use Spiral\Boot\DirectoriesInterface;
use Spiral\Boot\Environment;
use Spiral\Boot\EnvironmentInterface;
use Spiral\Files\Files;
use Spiral\Http\Http;
use Spiral\Translator\TranslatorInterface;
use Spiral\Views\ViewsInterface;
use Tests\Traits\InteractsWithConsole;
use Tests\Traits\InteractsWithHttp;

abstract class TestCase extends BaseTestCase
{
    use InteractsWithConsole;
    use InteractsWithHttp {
        get as httpGet;
    }
    
    protected AbstractKernel $app;
    protected Http $http;
    protected ViewsInterface $views;
    protected EnvironmentInterface $env;

    /** @noinspection PhpFieldAssignmentTypeMismatchInspection */
    protected function setUp(): void
    {
        $this->app = $this->makeApp();
        $this->http = $this->app->get(HTTP::class);
        $this->views = $this->app->get(ViewsInterface::class);
        $this->app->get(TranslatorInterface::class)->setLocale('en');
        $this->env = $this->app->get(EnvironmentInterface::class);
    }

    protected function tearDown(): void
    {
        $fs = new Files();

        $runtime = $this->app->get(DirectoriesInterface::class)->get('runtime');
        if ($fs->isDirectory($runtime)) {
            $fs->deleteDirectory($runtime);
        }
    }

    protected function makeApp(array $env = []): TestApp
    {
        $root = dirname(__DIR__);

        return TestApp::init([
            'root' => $root,
            'app' => $root . '/app',
            'runtime' => $root . '/runtime/tests',
            'cache' => $root . '/runtime/tests/cache',
        ], new Environment($env), false);
    }

    public function get($uri, array $query = [], array $headers = [], array $cookies = []): ResponseInterface
    {
        return $this->httpGet($uri, $query, $headers + [
            'X-API-KEY' => $this->env->get('API_KEY'),
        ], $cookies);
    }
}
