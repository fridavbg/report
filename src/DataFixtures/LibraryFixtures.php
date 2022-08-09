<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;

class LibraryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 20; $i++) {
            $book = new Book();
            $book->setTitle('book '.$i);
            $book->setAuthor('author'.$i);
            var_dump($book);
            $manager->persist($book);
        }

        $manager->flush();
    }
}