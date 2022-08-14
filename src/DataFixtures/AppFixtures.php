<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 11; $i++) {
            $book = new Book();
            $book->setId($i);
            $book->setTitle('book '.$i);
            $book->setAuthor('author '.$i);
            $book->setDescription('Description from FIXTURE ' . $i);
            $book->setISBN($i);
            $book->setImage('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwallup.net%2Fwp-content%2Fuploads%2F2017%2F11%2F23%2F503458-paper-literature-books.jpg&f=1&nofb=1');
            $manager->persist($book);
        }
        $manager->flush();
    }
}