<?php

namespace App\Tests\Controller;

use App\Tests\TestTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\ApiController
 */
class ApiControllerTest extends WebTestCase
{
    use TestTrait;

    /**
     * @covers \App\Controller\ApiController::index
     * @return void
     */
    public function testApiIndexGood(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api');
        $this->assertResponseIsSuccessful();

        $data = $this->getArrayContent($client);

        $this->assertCount(2, $data);
        $this->assertArrayHasKey('message', $data);
        $this->assertArrayHasKey('path', $data);
    }
}
