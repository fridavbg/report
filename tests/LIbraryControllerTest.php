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

        for ($i = 1; $i < 11; $i++) {
            $book = new Book();
            $book->setTitle('book '.$i);
            $book->setAuthor('author '.$i);
            $book->setISBN($i);
            $book->setDescription('description ' . $i);
            $book->setImage('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fassets.entrepreneur.com%2Fcontent%2F3x2%2F2000%2F20191219170611-GettyImages-1152794789.jpeg&f=1&nofb=1');
            $this->entityManager->persist($book);
            }
            $this->entityManager->flush();

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
        // var_dump($this->entityManager->getConnection()->getConfiguration());
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
        $bookId = rand(1, 10);

        $this->client->request('GET', '/library/show/' . $bookId);
        $this->assertResponseStatusCodeSame(200);
    }
    
    /**
     * Check that exception is thrown for /library/show/{bookId}
     * if no bookId
     */
    // public function testExceptionShowBookById()
    // {
    //     $bookId = rand(1, 36);

    //     $this->client->request('GET', '/library/show/' . $bookId);
    //     $this->assertResponseStatusCodeSame(404);
    //     $response = $this->client->getResponse();
    //     $data = $response->getContent();
    //     $this->assertStringContainsString( 'No book found for id ' . $bookId, $data);
    // }
}
