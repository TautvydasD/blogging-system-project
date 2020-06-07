<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage()
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/Newpage")
     * @return Response
     */
    public function newpage()
    {
        return new Response('new page');
    }

    /**
     * @Route("/{Wildcard}")
     * @return Response
     */
    public function wild($Wildcard, EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Article::class);
        $article = $repository->findOneBy(['slug' => $Wildcard]);
        $answers = [
            'Poor kitten',
            'YOU ARE A TERRIBLE OWNER',
            'Maybe... try saying the spell backwards?nonono',
        ];
        if (!$article) {

            throw $this->createNotFoundException(sprintf('No article with name: %s', $Wildcard));
        }

        return $this->render('testing/homing.html.twig', [
            'article' => $article,
            'answers' => $answers,
//            sprintf('This is some wildcard stuff: %s', $Wildcard)
        ]);
    }
}