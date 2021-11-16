<?php

namespace App\DataFixtures;


use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Comments;
use App\Entity\User;
use App\Entity\UsersAddress;
use App\Entity\UsersInfos;
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
            $user = new User();
            $user->setEmail($faker->email);
            $user->setRoles($faker->randomElements([
                '["ROLE_USER"]',
                '["ROLE_WRITER"]',
                '["ROLE_PREMIUM"]',
                '["ROLE_MODERATOR"]'
             ]));
            $user->setPassword($faker->password());
            $user->setName($faker->name);
            $user->setIsVerified(0);
            $user->setPseudo($faker->userName);
            $user->setPhrase($faker->sentence($nbWords = 6, $variableNbWords = true));
            $manager->persist($user);
            $users[] = $user;

        }
//
//        $usersAddresses = [];
//
//        for ($i = 0; $i < 20; $i++) {
//            $usersAddresse = new UsersAddress();
//            $usersAddresse->setStreet($faker->streetAddress);
//            $usersAddresse->setCp($faker->postcode);
//            $usersAddresse->setCity($faker->city);
//            $usersAddresse->setUser($users[$faker->numberBetween(0,20)]);
//            $manager->persist($usersAddresse);
//            $usersAddresses[] = $usersAddresse;
//
//        }

//        $usersInfos = [];
//
//        for ($i = 0; $i < 20; $i++) {
//            $usersInfo = new UsersInfos();
//            $usersInfo->setIsValid($faker->numberBetween(0,1));
//            $usersInfo->setBirth(new \DateTime());
//            $usersInfo->setDateInscription(new \DateTime());
//            $usersInfo->setPhone($faker->phoneNumber);
//            $usersInfo->setIp($faker->ipv4);
//            $usersInfo->setNewsletter($faker->numberBetween(0,1));
//            $usersInfo->setUser($users[$faker->numberBetween(0,20)]);
//
//            $manager->persist($usersInfo);
//            $usersInfos[] = $usersInfo;
//
//        }


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
            $article->setTitle($faker->text(20));
            $article->setContent($faker->text(3000));
            $article->setDate(new \DateTime());
            $article->setOnline(1);
            $article->setSlug($faker->slug());
            $article->setEdition(new \DateTime());
            $article->setNbrView($faker->numberBetween(0,50));
            $article->setReport($faker->numberBetween(0,20));
            $article->setCategorie($categories[$faker->numberBetween(0,20)]);
            $article->setImage($faker->imageUrl());
            $article->setCreatedAt(new \DateTime());
            $article->setAuteur($users[$faker->numberBetween(0,20)]);

            $manager->persist($article);
            $articles[] = $article;

        }

        $comments = [];

        for ($i = 0; $i < 50; $i++) {
            $comment = new Comments();
            $comment->setAuthor($faker->userName);
            $comment->setComment($faker->text(300));
            $comment->setDate(new \DateTime());
            $comment->setApproved(1);
            $comment->setReport($faker->numberBetween(0,5));
            $comment->setAuteur($users[$faker->numberBetween(0,30)]);
            $comment->setArticle($articles[$faker->numberBetween(0,20)]);

            $manager->persist($comment);
            $comments[] = $comment;

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
