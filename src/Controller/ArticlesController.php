<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\User;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $articles = $repo->findAll();
        $categories = $repoCategories->findAll();

//       dd($articles);




        return $this->render('articles/index.html.twig', [
            'controller_name' => 'Home Page Articles',
            'articles' => $articles,
            'categories' => $categories,

        ]);
    }



    /**
     * @Route("/show/{id}", name="show")
     */
    public function show($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        //$repoCategories = $this->getDoctrine()->getRepository(Categories::class);

        $article = $repo->find($id);
        //$categories = $repoCategories->findAll();

        if(!$article){
            $this->redirectToRoute('home');
        }

//       dd($articles);


        return $this->render('show/show.html.twig', [
            'controller_name' => 'Show Article',
            'article' => $article,
            //'categories' => $categories,


        ]);
    }




}
