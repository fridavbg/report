<?php

namespace App\Classes\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class CardTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected properties.
     */
    public function testCreateCard()
    {
        $card = new Card('H', '2');
        $this->assertInstanceOf("\App\Classes\Card\Card", $card);

        $res = $card->getCardObj();
        $this->assertNotEmpty($res);
    }

    /**
     * Construct object and verify that the object has the expected value
     */
    public function testCreateCardVerifyValue()
    {
        $card = new Card('H', '2');
        $this->assertInstanceOf("\App\Classes\Card\Card", $card);

        $res = $card->getValue();
        $this->assertEquals($res, '2');
    }
    /**
     * Construct object and verify that the object has the expected value
     */
    public function testCreateCardVerifySuit()
    {
        $card = new Card('H', '2');
        $this->assertInstanceOf("\App\Classes\Card\Card", $card);

        $res = $card->getSuite();
        $this->assertEquals($res, 'H');
    }

    /**
     * Construct object and verify that the object has the expected value
     */
    public function testCreateCardVerifyValueAsString()
    {
        $card = new Card('H', '2');
        $this->assertInstanceOf("\App\Classes\Card\Card", $card);

        $res = $card->__toString();
        $this->assertEquals($res, '2');
    }
}
