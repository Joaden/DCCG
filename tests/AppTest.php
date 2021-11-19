<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

// TestCase pour faire des test basic unitaire
// KernelTestCase pour les tests fonctionnels
// WebTestCase pour les tester les controller (envoi de requet et reponse)
class AppTest extends TestCase {

    public function testTestsAreWorking() {
        $this->assertEquals(2, 1+1);
    }

}
