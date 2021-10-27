<?php

namespace App\DataFixtures;


use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class AppFixtures extends Fixture
{
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

        for ($i = 0; $i < 50; $i++) {
            $user = new Users();
            $user->setName($faker->name);
            $user->setEmail($faker->email);
            $user->setPassword($faker->password());
            $user->setPseudo($faker->userName);
            $user->setIsVerified(0);
            $user->setCreatedAt(new \DateTime());
            $user->setPhrase($faker->sentence($nbWords = 6, $variableNbWords = true));
            $manager->persist($user);
            $users[] = $user;

        }


        $categories = [];

        for ($i = 0; $i < 50; $i++) {
            $categorie = new Categories();
            $categorie->setName($faker->name);
            $categorie->setSlug($faker->slug());
            $categorie->setIsValid(1);

            $manager->persist($categorie);
            $categories[] = $categorie;

        }
        $articles = [];

        for ($i = 0; $i < 50; $i++) {
            $article = new Articles();
            $article->setTitle($faker->text(30));
            $article->setContent($faker->text(3000));
            $article->setDate(new \DateTime());
            $article->setAuthor($faker->name);
            $article->setOnline(1);
            $article->setSlug($faker->slug());
            $article->setEdition(new \DateTime());
            $article->setNbrView($faker->numberBetween(0,50));
            $article->setReport($faker->numberBetween(0,20));
            $article->setCategoriesId($categories[$faker->numberBetween(0,30)]);
            $article->setUserId($users[$faker->numberBetween(0,40)]);

            $manager->persist($article);
            $articles[] = $article;

        }


        // generate data by accessing properties
//        echo $faker->name;
//        // 'Lucy Cechtelar';
//        echo $faker->address;
//        // "426 Jordy Lodge
//        // Cartwrightshire, SC 88120-6700"
//        echo $faker->text;

        $manager->flush();
    }
}
