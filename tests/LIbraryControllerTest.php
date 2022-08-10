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
    private $books;

    protected function setUp(): void
    {
        $this->client = static::createClient();

        $this->entityManager = $this->client->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->book = new Book();
        $this->book->setTitle('Test');
        $this->book->setAuthor('Testie Testson');
        $bookRepository = $this->entityManager
            ->getRepository(Book::class);
        $this->books = $bookRepository->findAll();
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
    public function testShowBookById()
    {
        var_dump($this->books);
        // $bookId = $this->book->getId();

        // $this->client->request('GET', '/library/show/' . $bookId);
        // $this->assertResponseStatusCodeSame(200);
    }
    
    /**
     * Check that exception is thrown for /library/show/{bookId}
     * if no bookId
     */
    // public function testExceptionShowBookById()
    // {
    //     $bookId = 1;

    //     $this->client->request('GET', '/library/show/' . $bookId);
    //     $this->assertResponseStatusCodeSame(404);
    // }
}
