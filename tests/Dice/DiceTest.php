<?php

namespace App\Classes\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateDice()
    {
        $die = new Dice();
        $this->assertInstanceOf("\App\Classes\Dice\Dice", $die);

        $res = $die->getAsString();
        $this->assertNotEmpty($res);
    }
    /**
     * Verify that when dice is rolled it gives a value between 1 to 6.
     */
    public function testRoll()
    {
        $die = new Dice();
        $this->assertInstanceOf("\App\Classes\Dice\Dice", $die);

        $die->roll();
        $res = $die->getAsString();
        $this->assertGreaterThanOrEqual(1, $res);
        $this->assertLessThanOrEqual(['6'], $res);
    }
}