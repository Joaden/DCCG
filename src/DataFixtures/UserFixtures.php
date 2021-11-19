<?php
/**
 * Created by PhpStorm.
 * User: chane
 * Date: 18/11/2021
 * Time: 10:19
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;

use App\Entity\User;
use App\Entity\UsersAddress;
use App\Entity\UsersInfos;

use Doctrine\Persistence\ObjectManager;

use Faker;



class UserFixtures extends Fixture {


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $users = [];

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setRoles($faker->randomElements([
                'ROLE_USER',
                'ROLE_WRITER',
                'ROLE_PREMIUM',
                'ROLE_MODERATOR'
            ]));
            $user->setPassword($faker->password());
            $user->setName($faker->name);
            $user->setIsVerified(0);
            $user->setPseudo($faker->userName);
            $user->setPhrase($faker->sentence($nbWords = 6, $variableNbWords = true));
            $manager->persist($user);
            $users[] = $user;

        }

    }
}