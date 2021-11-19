<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DomCrawler\Crawler;

class SecurityControllerTest extends WebTestCase
{
    public function testDisplayLogin() {
        $client = static::createClient();
        $client->request('GET', '/login');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h2', 'Connexion');
        $this->assertSelectorNotExists('.alert.alert-danger');


    }


    public function testLoginWithBadCredentials() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form([
            'email' => 'john@doe.fr',
            'password' => 'fakepasswd',
        ]);
        $client->submit($form);

        $this->assertResponseRedirects('/login');
        $client->followRedirect();
        $this->assertSelectorExists('.alert.alert-danger');

//        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
//        $this->assertSelectorTextContains('h2', 'Se connecter');

    }



}