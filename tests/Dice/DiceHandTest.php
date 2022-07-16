<?php

namespace App\Classes\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceHandTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateDiceHand()
    {
        $dieHand = new DiceHand();
        $this->assertInstanceOf("\App\Classes\Dice\DiceHand", $dieHand);

        $res = $dieHand->getAsString();
        $this->assertEmpty($res);
    }

    /**
     * Test to add dice to hand
     */
    public function testAddToHand()
    {
        $die = new Dice();
        $dieHand = new DiceHand();
        $this->assertInstanceOf("\App\Classes\Dice\DiceHand", $dieHand);

        $dieHand->add($die);
        $res = $dieHand->getAsString();
        $this->assertNotEmpty($res);
    }

    /**
     * Verify that when dice is rolled it gives a value between 1 to 6.
     */
    public function testRoll()
    {
        $die = new Dice();
        $dieHand = new DiceHand();
        $this->assertInstanceOf("\App\Classes\Dice\DiceHand", $dieHand);

        $dieHand->add($die);
        $dieHand->roll();
        $res = $dieHand->getAsString();
        $this->assertGreaterThanOrEqual(1, $res);
        $this->assertLessThanOrEqual(['6'], $res);
    }

    /**
     * Verify that when dies in diceHand can be counted
     */
    public function testGetNumberDices()
    {
        $die = new Dice();
        $dieHand = new DiceHand();
        $this->assertInstanceOf("\App\Classes\Dice\DiceHand", $dieHand);

        $dieHand->add($die);
        $dieHand->getNumberDices();
        $res = $dieHand->getAsString();
        $this->assertGreaterThanOrEqual(0, $res);
    }
}
