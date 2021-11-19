<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PageControllerTest extends WebTestCase
{
    public function testHelloPage() {
        $client = static::createClient();
        $client->request('GET', '/hello');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'BLOG DCCG');

    }


    public function testAuthPageRestricted() {
        $client = static::createClient();
        $client->request('GET', '/login');
        $this->assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED);
    }


    public function testRedirectToLogin() {
        $client = static::createClient();
        $client->request('GET', '/login');
        $this->assertResponseRedirects('/login');
    }
}