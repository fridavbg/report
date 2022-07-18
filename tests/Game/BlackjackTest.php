<?php

namespace App\Classes\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class BlackjackTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateBlackjack()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $playerRepo = $blackjack->getPlayerRepo();
        $deck = $blackjack->getDeck();
        $this->assertNotEmpty($playerRepo);
        $this->assertNotEmpty($deck);
    }

    /**
     * Construct object and verify that the object has a deck of 52 cards.
     */
    public function testGetCurrentDeck()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $deck = $blackjack->getCurrentDeck();
        $this->assertNotEmpty($deck);
        $this->assertCount(52, $deck);
    }

    /**
     * Construct object and verify that the object has a deck of 52 cards.
     */
    public function testReset()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $blackjack->reset();

        $playerRepo = $blackjack->getPlayerRepo();
        $deck = $blackjack->getDeck();
        $activeDeck = $blackjack->getCurrentDeck();

        $player = $playerRepo->findByType('Player');
        $dealer = $playerRepo->findByType('Dealer');

        $playerHand = $player->getCurrentCardHand();
        $playerScore = $player->getCurrentScore();

        $dealerHand = $dealer->getCurrentCardHand();
        $dealerScore = $dealer->getCurrentScore();

        $this->assertNotEmpty($playerRepo);
        $this->assertNotEmpty($deck);
        $this->assertCount(52, $activeDeck);

        $this->assertEmpty($playerHand);
        $this->assertEquals($playerScore, 0);

        $this->assertEmpty($dealerHand);
        $this->assertEquals($dealerScore, 0);
    }

    /**
     * Construct object and verify that if scores are under 21, the player closest to 21 wins
     */
    public function testBlackjackScoresUnder21()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $playerRepo = $blackjack->getPlayerRepo();
        $player = $playerRepo->findByType('Player');
        $dealer = $playerRepo->findByType('Dealer');

        $player->setCurrentScore(20);
        $dealer->setCurrentScore(18);
        $blackjack->blackJack();

        $playerWins = $player->getTotalWins();
        $this->assertEquals(1, $playerWins);
    }

    /**
     * Construct object and verify that if player get over 21, the dealer wins
     */
    public function testBlackjackScoreOver21PlayerOver21()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $playerRepo = $blackjack->getPlayerRepo();
        $player = $playerRepo->findByType('Player');
        $dealer = $playerRepo->findByType('Dealer');

        $player->setCurrentScore(26);
        $dealer->setCurrentScore(24);
        $blackjack->blackJack();

        $dealerWins = $dealer->getTotalWins();
        $this->assertEquals(1, $dealerWins);
    }

    /**
     * Construct object and verify that if dealer gets 21, the dealer wins
     */
    public function testBlackjackScoreOver21Dealer21()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $playerRepo = $blackjack->getPlayerRepo();
        $player = $playerRepo->findByType('Player');
        $dealer = $playerRepo->findByType('Dealer');

        $player->setCurrentScore(26);
        $dealer->setCurrentScore(21);
        $blackjack->blackJack();

        $dealerWins = $dealer->getTotalWins();
        $this->assertEquals(1, $dealerWins);
    }

    /**
     * Construct object and verify that if dealer gets 21, the dealer wins
     */
    public function testBlackjackScoreOver21Player21()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $playerRepo = $blackjack->getPlayerRepo();
        $player = $playerRepo->findByType('Player');
        $dealer = $playerRepo->findByType('Dealer');

        $player->setCurrentScore(21);
        $dealer->setCurrentScore(24);
        $blackjack->blackJack();

        $playerWins = $player->getTotalWins();
        $this->assertEquals(1, $playerWins);
    }


    /**
     * Construct object and verify that if dealer more points than the player, the player wins
     */
    public function testBlackjackScoreOver21Dealer()
    {
        $blackjack = new Blackjack();
        $this->assertInstanceOf("\App\Classes\Game\Blackjack", $blackjack);

        $playerRepo = $blackjack->getPlayerRepo();
        $player = $playerRepo->findByType('Player');
        $dealer = $playerRepo->findByType('Dealer');

        $player->setCurrentScore(23);
        $dealer->setCurrentScore(24);
        $blackjack->blackJack();

        $playerWins = $player->getTotalWins();
        $this->assertEquals(1, $playerWins);
    }
}
