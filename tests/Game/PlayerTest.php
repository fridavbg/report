<?php

namespace App\Classes\Game;

use PHPUnit\Framework\TestCase;
use App\Classes\Card\Card;
use App\Classes\Card\Deck;

/**
 * Test cases for class Dice.
 */
class PlayerTest extends TestCase
{

    /**
     * Construct object and verify that currentHand properties can be changed
     */
    public function testSetCurrentCardHand()
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Classes\Game\Player", $player);

        $player->setCurrentCardHand([new Card('H', '9'), new Card('S', 'A')]);
        $this->assertCount(2, $player->getCurrentCardHand());
    }

    /**
     * Construct object and verify that the points of players cardhand can be calculated
     */
    public function testSCalculateCardHand()
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Classes\Game\Player", $player);

        $player->setCurrentCardHand([new Card('H', '9'), new Card('S', 'A')]);
        $playerHand = $player->getCurrentCardHand();
        $player->calculateCardHand($playerHand);
        $this->assertEquals(20, $player->getCurrentScore());
    }

    /**
     * Construct object and verify that the player type is accessible
     */
    public function testGetPlayer()
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Classes\Game\Player", $player);

        $this->assertEquals('Player', $player->getPlayer());
    }

    /**
     * Construct object and verify that the player type can be changed
     */
    public function testSetPlayer()
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Classes\Game\Player", $player);

        $player->setPlayer('Dealer');
        $this->assertEquals('Dealer', $player->getPlayer());
    }

    /**
     * Construct object and verify that the player property is active
     */
    public function testIsActive()
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Classes\Game\Player", $player);

        $this->assertTrue($player->isActive());
    }

    /**
     * Construct object and verify that the player can draw a card
     */
    public function testDraw()
    {
        $player = new Player();
        $deck = new Deck();
        $this->assertInstanceOf("\App\Classes\Game\Player", $player);

        $player->draw($deck);
        $this->assertCount(1, $player->getCurrentCardHand());
    }

    /**
     * Test to switch from player to dealer
     */
    public function testStop()
    {
        $player = new Player();
        $this->assertInstanceOf("\App\Classes\Game\Player", $player);

        $player->stop();
        $this->assertFalse($player->isActive());
    }
}
