<?php

namespace App\Classes\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class Deck2Test extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateDeck2()
    {
        $deck2 = new Deck2();
        $this->assertInstanceOf("\App\Classes\Card\Deck2", $deck2);

        $deck2->jokers();
        $values = $deck2->getValues();
        $suits = $deck2->getSuits();
        $this->assertContains('Joker', $values, "No jokers in deck");
        $this->assertContains('Black', $suits, "No black suits in deck");
    }
}