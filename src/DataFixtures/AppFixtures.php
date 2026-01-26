<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Blogger;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Tworzymy blogera
        $blogger = new Blogger();
        $blogger->setName('Jan Kowalski');
        $blogger->setAge(25);
        $manager->persist($blogger);

        // Tworzymy artykuł
        $article = new Article();
        $article->setTitle('wuthering heist');
        $article->setDescription('Wuthering Heist" is an episode of the British anthology series Inside No. 9, not a story from Wuthering Heights. The plot involves a criminal named Pantalone hiring a crew to steal diamonds, but he has assembled a team of double-crossing clowns, leading to a chaotic and disastrous heist.');
        $article->setDateAdded(new \DateTime('2023-10-11'));
        
        // Przypisujemy blogera do artykułu
        $article->addBloggerName($blogger);

        $manager->persist($article);

        // Zapis wszystkich zmian do bazy
        $manager->flush();
    }
}