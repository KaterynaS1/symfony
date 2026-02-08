<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Blogger;
use App\Service\ReadingTimeCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function mainPage(
        EntityManagerInterface $em,
        ReadingTimeCalculator $calculator
    ): Response {
        $articles = $em->getRepository(Article::class)->findAll();

        $articlesWithTime = [];
        foreach ($articles as $article) {
            $articlesWithTime[] = [
                'article' => $article,
                'readingTime' => $calculator->calculate($article->getDescription() ?? ''),
            ];
        }

        return $this->render('blog/index.html.twig', [
            'articles' => $articlesWithTime,
        ]);
    }

    #[Route('/article/{id}', name: 'article_show', requirements: ['id' => '\d+'])]
    public function showArticle(
        Article $article,
        ReadingTimeCalculator $calculator
    ): Response {
        $readingTime = $calculator->calculate($article->getDescription() ?? '');

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'readingTime' => $readingTime,
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
