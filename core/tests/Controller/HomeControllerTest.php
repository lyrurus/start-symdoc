<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\HomeController
 */
class HomeControllerTest extends WebTestCase
{
    private const TITLE = 'Hello HomeController!';

    /**
     * @covers \App\Controller\HomeController::index
     * @return void
     */
    public function testHomeIndex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertEquals(self::TITLE, $crawler->filter('title')->innerText());
        $this->assertSelectorTextContains('h1', self::TITLE);
    }
}
