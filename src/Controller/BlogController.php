<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Blogger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class BlogController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function mainPage(EntityManagerInterface $em): Response
    {
        $articles = $em->getRepository(Article::class)->findAll();

        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/article/{id}', name: 'article_show', requirements: ['id' => '\d+'])]
    public function showArticle(Article $article): Response
    {
        return $this->render('blog/article.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/profil/{id}', name: 'my_profile', requirements: ['id' => '\d+'])]
    public function profile(Blogger $blogger): Response
    {
        return $this->render('blog/profile.html.twig', [
            'blogger' => $blogger,
        ]);
    }
}
