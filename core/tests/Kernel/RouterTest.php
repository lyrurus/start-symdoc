<?php

namespace App\Tests\Kernel;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RouterTest extends KernelTestCase
{
    /**
     * @return void
     */
    public function testRoutes(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        $routerService = static::getContainer()->get('router');
        $routes = $routerService->getRouteCollection()->getIterator()->getArrayCopy();

        $this->assertInstanceOf(Router::class, $routerService);
        $this->assertCount(2, $routerService->getRouteCollection());
        $this->assertEquals(['app_api', 'app_home'], array_keys($routes));
    }
}
