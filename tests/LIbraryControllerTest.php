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
    private $bookRepository;

    protected function setUp(): void
    {
        $this->client = static::createClient();

        $this->entityManager = $this->client->getContainer()
            ->get('doctrine')
            ->getManager();
        // $this->truncateEntities();

        $fixture = new AppFixtures();
        $fixture->load($this->entityManager);

        $this->bookRepository = $this->entityManager
            ->getRepository(Book::class);
    }

    private function truncateEntities()
    {
        $purger = new ORMPurger($this->entityManager);
        $purger->purge();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
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
        // $books = $this->bookRepository->findAll();
        // var_dump($books);
        $bookId = 2;

        $this->client->request('GET', '/library/show/' . $bookId);
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that response is successful for /library/create/form
     */
    public function testCreateBookForm()
    {
        $this->client->request('GET', '/library/create/form');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that response is successful for /library/create
     */

    // public function testCreateBookProcess()
    // {
    //     $title = 'Title';
    //     $author = 'Author McAuthorson';
    //     $isbn = '1234-567-8910';
    //     $description = 'Descriptive descriptionness';
    //     $image = 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.probytes.net%2Fwp-content%2Fuploads%2F2018%2F01%2F4-1.png&f=1&nofb=1';

    //     $book = new Book();
    //     if (
    //         is_string($title) and
    //         is_string($author) and
    //         is_string($isbn) and
    //         is_string($description) and
    //         is_string($description) and
    //         is_string($image)
    //     ) {
    //         $book->setTitle($title);
    //         $book->setAuthor($author);
    //         $book->setISBN($isbn);
    //         $book->setDescription($description);
    //         $book->setImage($image);
    //     }

    //     $entityManagerMock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
    //     ->setMethods(array('persist', 'flush'))
    //     ->disableOriginalConstructor()
    //     ->getMock();

    //     $entityManagerMock->expects($this->once())
    //         ->method('flush');

    //     $this->client->followRedirects();
    //     $this->client->request('POST', '/library/create');

    //     $response = $this->client->getResponse();
    //     var_dump($response);
    // }

    /**
     * Check that response is successful for /library/update/form/{bookId}
     */
    public function testUpdateBookForm()
    {
        $bookId = 1;

        $this->client->request('GET', '/library/update/form/' . $bookId);
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that exception is thrown for /library/update/form/{bookId}
     * if no bookId
     */
    public function testExceptionUpdateBookForm()
    {
        $bookId = 24;

        $this->client->request('GET', '/library/update/form/' . $bookId);
        $this->assertResponseStatusCodeSame(404);
        $response = $this->client->getResponse();
        $data = $response->getContent();
        $this->assertStringContainsString('No book found for id ' . $bookId, $data);
    }

    /**
     * Check that page is redirecting after deleting a book with id 1
     */
    public function testRedirectDeleteBookById()
    {
        $bookId = 1;

        $this->client->request('GET', '/library/delete/' . $bookId);
        $this->assertResponseStatusCodeSame(302);
        $response = $this->client->getResponse();
        $data = $response->getContent();
        $this->assertStringContainsString('Redirecting to /library/show', $data);
    }
}
