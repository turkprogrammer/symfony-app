<?php

namespace App\Tests\Functional\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 */
class HealthCheckActionTest extends WebTestCase
{

    /**
     * @return void
     */
    public function test_request_responded_successful_result(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/health-check');

        $this->assertResponseIsSuccessful();
        $jsonResult = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals($jsonResult['status'], 'ok');

    }
}
