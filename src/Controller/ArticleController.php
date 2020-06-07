<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/new")
     */
    public function new(EntityManagerInterface $em) {
        $article = new Article();
        $article->setTitle('Reversing A Spells')
            ->setSlug('reversing-a-spell-'.rand(100,999))
            ->setText(<<<EOF
I've been turned into a cat, any thoughts on how to turn back? While I'm adorable, I don't really care for cat food.
EOF
        );

        if(rand(1,10) > 2) {
            $article -> setPublishedAt(new \DateTime(sprintf('-%d days', rand(1,100))));
        }

        $em->persist($article);
        $em->flush();

        return new Response(sprintf("New article created id: #%d slug: %s",
        $article->getId(),
        $article->getSlug()
        ));
    }

    /**
     * @Route("/article/{slug}", name="app_article_show")
     * @param $slug
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function show($slug, EntityManagerInterface $em) {

        $repository = $em->getRepository(Article::class);

        /** @var Article $article */
        $article = $repository->findOneBy(['slug' => $slug]);
        if (!$article) {
            throw $this->createNotFoundException(sprintf('No article with name: %s', $slug));
        }
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/article/createNew")
     * @return Response
     */
    public function createNew() {
        return $this->render('createArticle.html.twig');
    }
}