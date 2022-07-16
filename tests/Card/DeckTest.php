<?php

namespace App\Classes\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DeckTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected properties, use no arguments.
     */
    public function testCreateDeck()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $res = $deck->createDeck();
        $this->assertNotEmpty($res);
    }

    /**
     * Construct Deck and verify that the Deck has 52 cards.
     */
    public function testGetDeck()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $res = $deck->getDeck();
        $this->assertCount(52, $res);
    }

    /**
     * Construct Deck and verify that the Deck can be changed.
     */
    public function testSetDeck()
    {
        $deck = new Deck();
        $newDeck = $deck->shuffleDeck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $deck->setDeck($newDeck);
        $res = $deck->getDeck();
        $this->assertCount(52, $res);
    }

    /**
     * Construct Deck and verify that the cardHand is empty when starting
     */
    public function testGetCardHand()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $res = $deck->getCardHand();
        $this->assertCount(0, $res);
    }

    /**
     * Construct Deck and verify that the cardHand can hold cards
     */
    public function testSetCardHand()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $deck->setCardHand([new Card('H', '2')]);
        $res = $deck->getCardHand();
        $this->assertCount(1, $res);
    }

    /**
     * Construct Deck and verify that the deck can be shuffled
     */
    public function testShuffleDeck()
    {
        $deck1 = new Deck();
        $deck2 = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck1);
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck2);

        $deck1->shuffleDeck();
        $res1 = $deck1->getDeck();
        $res2 = $deck2->getDeck();

        $this->assertEqualsCanonicalizing($res1, $res2);
    }

    /**
     * Construct Deck and verify that N number of cards can be drawn from Deck
     */
    public function testGetCards()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $deck->getCards(9);
        $res = $deck->getDeck();

        $this->assertCount(43, $res);
    }

    /**
     * Construct Deck and verify that N number of cards can be drawn from Deck
     */
    public function testGetCardsForPlayer()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $deck->getCardForPlayer(1);
        $res = $deck->getDeck();

        $this->assertCount(51, $res);
    }

    /**
     * Construct Deck and get Deck in JSON format
     */
    public function testGetJson()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Card\Deck", $deck);

        $res = $deck->getJson();
        $this->assertStringContainsString("suit", $res);
        $this->assertStringContainsString("value", $res);
    }
}
