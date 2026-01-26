<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Blogger; // <-- dodaj to
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

    #[Route('/profil', name: 'my_profile')]
    public function profile(EntityManagerInterface $em): Response
    {
        $blogger = $em->getRepository(Blogger::class)->find(1);

        return $this->render('blog/profile.html.twig', [
            'blogger' => $blogger,
        ]);
    }
}