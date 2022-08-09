<?php

namespace App\Controller;

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
    public function testShowAllBooks() {
        $client = static::createClient();
        $client->request('GET', '/library/show');
        $this->assertResponseIsSuccessful();
    }

    /**
     * Check that response is successful for /library/show/{bookId}
     */
    public function testShowBookById() {
        $client = static::createClient();
        $bookId = 1;
        $client->request('GET', '/library/show/' . $bookId);
        $this->assertResponseIsSuccessful();
    }

}