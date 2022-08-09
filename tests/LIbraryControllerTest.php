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
     * Check that response is successful for /library
     */
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/library');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that response is successful for /library/show
     */
    public function testShowAllBooks()
    {
        $client = static::createClient();
        $client->request('GET', '/library/show');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that exceptions is thrown for /library/show/{bookId}
     */
    // public function testExceptionShowBookById() {
    //     $client = static::createClient();
    //     // $bookId = rand(7, 37);
    //     $bookId = 37;
    //     $client->request('GET', '/library/show/' . $bookId);
    //     $this->assertResponseStatusCodeSame(200);
    // }
}
