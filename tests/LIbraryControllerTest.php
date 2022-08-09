<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test cases for class Dice.
 */
class LibraryControllerTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $book = new Book();
        $book->setTitle('Test');
        $book->setAuthor('Testie Testson');
        $bookRepository = $this->entityManager
            ->getRepository(Book::class);
        $bookRepository->add($book, true);
    }

    /**
     * Check that response is successful for /library
     */
    public function testIndex()
    {
        $this->client->request('GET', '/library');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that response is successful for /library/show
     */
    public function testShowAllBooks()
    {
        $this->client->request('GET', '/library/show');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that response is successful for /library/show/{bookId}
     */
    // public function testShowBookById()
    // {
    //     $client = static::createClient();
    //     $bookId = rand(1, 20);

    //     $client->request('GET', '/library/show/' . $bookId);
    //     $this->assertResponseStatusCodeSame(200);
    // }

    /**
     * Check that expception is thrown for /library/show/{bookId}
     */
    // public function testExceptionShowBookById()
    // {
    //     $client = static::createClient();
    //     $bookId = 20;

    //     $client->request('GET', '/library/show/' . $bookId);
    //     $this->assertResponseStatusCodeSame(404);
    // }
}
