<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Blogger;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    public function load(ObjectManager $manager): void
    {
        $bloggersData = [
            [
                'name' => 'Michał Kaczmarek',
                'age' => 32,
                'articles' => [
                    [
                        'title' => 'Czytanie przed snem',
                        'desc' => 'Czytanie książki przed snem to jeden z najprostszych sposobów na wyciszenie po całym dniu. Kilkanaście minut lektury pozwala oderwać myśli od obowiązków i ekranów. Dzięki temu łatwiej zasnąć i sen jest spokojniejszy. Najlepiej sprawdzają się książki o wolnym tempie narracji. Unikam wtedy mocnych thrillerów. Papierowa książka działa zdecydowanie lepiej niż telefon.'
                    ],
                    [
                        'title' => 'Ulubione pierwsze zdania',
                        'desc' => 'Pierwsze zdanie książki często decyduje o tym, czy przeczytam ją dalej. Lubię, gdy autor od razu buduje klimat albo zadaje pytanie. Dobre otwarcie potrafi zostać w pamięci na lata. Czasem wracam do książek tylko po to, by przeczytać początek. To ciekawy sposób na przypomnienie sobie historii. Niektóre pierwsze zdania są lepsze niż całe rozdziały.'
                    ],
                    [
                        'title' => 'Krótkie opowiadania',
                        'desc' => 'Zbiory opowiadań są idealne na dni, gdy brakuje czasu. Każda historia jest zamkniętą całością. Nie trzeba pamiętać wielu wątków naraz. To dobra forma na przerwę w pracy albo w podróży. Często autorzy eksperymentują bardziej niż w powieściach. Dzięki temu opowiadania potrafią zaskoczyć.'
                    ],
                ],
            ],
            [
                'name' => 'Julia Nowak',
                'age' => 29,
                'articles' => [
                    [
                        'title' => 'Jak wybieram książki',
                        'desc' => 'Wybór nowej książki to dla mnie mały rytuał. Zawsze zaczynam od opisu na tylnej okładce. Potem sprawdzam opinie kilku czytelników, ale unikam spoilerów. Okładka ma znaczenie, choć nie jest najważniejsza. Czasem decyduje polecenie znajomej osoby. Najczęściej jednak intuicja okazuje się najlepszym doradcą.'
                    ],
                    [
                        'title' => 'Czy warto czytać serie',
                        'desc' => 'Serie książkowe potrafią wciągnąć na długie tygodnie. Dobrze zbudowany świat sprawia, że nie chce się go opuszczać. Z drugiej strony trzeba uważać na spadek poziomu w kolejnych tomach. Lubię, gdy autor ma pomysł na całość od początku. Wtedy historia jest spójna. Najbardziej cenię serie, które kończą się w odpowiednim momencie.'
                    ],
                    [
                        'title' => 'Czytnik czy papier',
                        'desc' => 'Przez długi czas czytałam tylko papierowe książki. Z czasem przekonałam się jednak do czytnika. Jest wygodny w podróży i pozwala mieć wiele książek pod ręką. Papier wygrywa zapachem i dotykiem. Czytnik wygrywa praktycznością. Dziś korzystam z obu form w zależności od sytuacji.'
                    ],
                ],
            ],
            [
                'name' => 'Paweł Zieliński',
                'age' => 35,
                'articles' => [
                    [
                        'title' => 'Książki na weekend',
                        'desc' => 'Weekend to idealny moment na nadrobienie czytelniczych zaległości. Wybieram wtedy książki, które czyta się lekko i szybko. Lubię krótkie rozdziały i wyraźną fabułę. Dzięki temu łatwo wrócić do lektury po przerwie. Unikam wtedy ciężkich tematów. Czytanie ma być przyjemnością, a nie obowiązkiem.'
                    ],
                    [
                        'title' => 'Top 5 reportaży',
                        'desc' => 'Reportaże potrafią być bardziej wciągające niż fikcja. Prawdziwe historie często poruszają najmocniej. Lubię reportaże, które pokazują świat z innej perspektywy. Dobrze napisany reportaż uczy empatii. Często zostaje w głowie na długo. To gatunek, do którego regularnie wracam.'
                    ],
                    [
                        'title' => 'Jak wrócić do czytania',
                        'desc' => 'Każdy ma moment, gdy przestaje czytać regularnie. Najgorsze, co można zrobić, to zmuszać się do trudnych książek. Lepiej zacząć od czegoś prostego i krótkiego. Nawet 10 stron dziennie robi różnicę. Z czasem pojawia się nawyk. A potem czytanie znów staje się naturalne.'
                    ],
                    [
                        'title' => 'Dobre nawyki czytelnicze',
                        'desc' => 'Czytanie to kwestia nawyku, a nie ilości wolnego czasu. Stała pora dnia bardzo pomaga. Dobrze mieć książkę zawsze pod ręką. Nawet kilka minut ma znaczenie. Ważne, by nie stawiać sobie zbyt ambitnych celów. Regularność jest ważniejsza niż tempo.'
                    ],
                ],
            ],
            [
                'name' => 'Agnieszka Wójcik',
                'age' => 27,
                'articles' => [
                    [
                        'title' => 'Co daje biblioteka',
                        'desc' => 'Biblioteka to jedno z najbardziej niedocenianych miejsc. Można tam znaleźć nowości i klasyki bez wydawania pieniędzy. Lubię ciszę i atmosferę skupienia. To dobre miejsce do odkrywania nowych autorów. Biblioteka zachęca do eksperymentowania z gatunkami. Dzięki niej czytam więcej i różnorodniej.'
                    ],
                    [
                        'title' => 'Książkowy minimalizm',
                        'desc' => 'Nie trzeba mieć setek książek na półkach, by być czytelnikiem. Wolę mniej, ale świadomie wybranych tytułów. Zbyt duża liczba książek potrafi przytłoczyć. Minimalizm pomaga skupić się na treści. Częściej wracam do przeczytanych pozycji. To daje większą satysfakcję.'
                    ],
                    [
                        'title' => 'Czytanie w podróży',
                        'desc' => 'Podróże to świetny moment na czytanie. Pociąg czy autobus sprzyjają skupieniu. Wtedy łatwiej oderwać się od codziennych spraw. Najczęściej wybieram ebooki lub audiobooki. Krótsze formy sprawdzają się najlepiej. Dzięki temu podróż mija szybciej.'
                    ],
                ],
            ],
        ];

        foreach ($bloggersData as $bData) {
            $blogger = new Blogger();
            $blogger->setName($bData['name']);
            $blogger->setAge($bData['age']);
            $manager->persist($blogger);

            foreach ($bData['articles'] as $aData) {
                $article = new Article();
                $article->setTitle($aData['title']);
                $article->setDescription($aData['desc']);
                $article->setDateAdded(new \DateTime());
                $article->addBloggerName($blogger);
                $manager->persist($article);
            }
        }

        $usersData = [
            ['email' => 'michal.kaczmarek@example.com', 'password' => 'Blog2026!'],
            ['email' => 'julia.nowak@example.com', 'password' => 'Czytam2026!'],
            ['email' => 'pawel.zielinski@example.com', 'password' => 'Ksiazki2026!'],
            ['email' => 'agnieszka.wojcik@example.com', 'password' => 'Lektura2026!'],
        ];

        foreach ($usersData as $uData) {
            $user = new User();
            $user->setEmail($uData['email']);
            $user->setRoles(['ROLE_USER']);
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, $uData['password'])
            );
            $manager->persist($user);
        }

        $manager->flush();
    }
}
