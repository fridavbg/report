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
            $book->setTitle('book ' . $i);
            $book->setAuthor('author ' . $i);
            $book->setDescription('Description from FIXTURE ' . $i);
            $book->setISBN(strval($i));
            $book->setImage('https://bit.ly/3ANU9Xb');
            $manager->persist($book);
        }
        $manager->flush();
    }
}
