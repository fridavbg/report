<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testAdd()
    {
        $book = new Book();
        $book->setTitle('Test');
        $book->setAuthor('Testie Testson');
        $bookRepository = $this->entityManager
        ->getRepository(Book::class);
        $bookRepository->add($book, true);

        $this->assertSame('Test', $book->getTitle());
        $this->assertSame('Testie Testson', $book->getAuthor());
    }

    public function testRemove()
    {
        $book = new Book();
        $book->setTitle('Test');
        $book->setAuthor('Testie Testson');
        $bookRepository = $this->entityManager
        ->getRepository(Book::class);
        $bookRepository->remove($book, true);
        $this->assertNull($book->getId());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
