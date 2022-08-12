<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\DataFixtures\AppFixtures;

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
        $this->truncateEntities();

        $fixture = new AppFixtures();
        $fixture->load($this->entityManager);

        $bookRepository = $this->entityManager
            ->getRepository(Book::class);
        $this->books = $bookRepository->findAll();
    }

    private function truncateEntities()
    {
        $purger = new ORMPurger($this->entityManager);
        $purger->purge();
    }

    public function tearDown()
    {
        $this->truncateEntities(); 
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
        var_dump($this->books);
    }

    /**
     * Check that response is successful for /library/show/{bookId}
     */
    // public function testShowBookById()
    // {
    //     $bookId = rand(1, 10);

    //     $this->client->request('GET', '/library/show/' . $bookId);
    //     $this->assertResponseStatusCodeSame(200);
    // }

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
