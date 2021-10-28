<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Users;
use App\Entity\User;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $articles = $repo->findAll();
        $categories = $repoCategories->findAll();

//       dd($articles);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Home Page Articles',
            'articles' => $articles,
            'categories' => $categories,

        ]);
    }
}