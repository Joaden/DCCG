<?php
/**
 * Created by PhpStorm.
 * User: chane
 * Date: 18/11/2021
 * Time: 10:30
 */

namespace App\Tests\Repository;


use App\DataFixtures\UserFixtures;
use App\Repository\UserRepository;
use Liip\TestFixturesBundle;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserRepositoryTest extends KernelTestCase {

//    use FixturesTrait;

    public function testCount() {

        self::bootKernel();
        $this->loadFictures([UserFixtures::class]);
        $users = self::$container->get(UserRepository::class)->count([]);
        $this->assertEquals(10, $users);
    }

}