<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use App\Classes\Card\Card;
use App\Classes\Game\CardHandManager;
use App\Classes\Game\GameManager;
use App\Classes\Game\Blackjack;
use App\Classes\Game\CardHandCalculator;
use App\Classes\Game\Player;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game-home")
     * Landing page to display rules and start button
     */
    public function home(SessionInterface $session): Response
    {
        $session->start();
        $session->clear();

        if (!$session->get("blackjack")) {
            $session->set("blackjack", new Blackjack());
        };

        $data = [
            'title' => 'Black jack'
        ];
        return $this->render('game/home.html.twig', $data);
    }

    /**
     * @Route("/game/doc", name="game-doc")
     * Page to display documentation
     */
    public function doc(): Response
    {
        $data = [
            'title' => 'Black jack Documentation'
        ];
        return $this->render('game/doc.html.twig', $data);
    }


    /**
     * @Route("/game/plan", name="game-plan", methods={"GET"})
     * Page to play the game
     * Renders player & dealer information 
     */
    public function plan(SessionInterface $session): Response
    {
        $game = $session->get('blackjack');
        $player = $game->players->findByType('Player');
        $dealer = $game->players->findByType('Dealer');
        $data = [
            'title' => 'Black jack',
            'blackjack' => $game,
            'dealer' => $dealer->type,
            'player'  => $player->type,
            'dealerWins' => $dealer->getTotalWins(),
            'playerWins' => $player->getTotalWins(),
            'playerHand' => $player->getCurrentCardHand(),
            'dealerHand' => $dealer->getCurrentCardHand(),
            'cards' => $game->deck->getDeck(),
            'playerPoints' => $player->getCurrentScore(),
            'dealerPoints' => $dealer->getCurrentScore(),
            'playerActive' => $player->playerActive
        ];
        return $this->render('game/plan.html.twig', $data);
    }

    /**
     * @Route("/game/plan", name="draw-process", methods={"POST"})
     * Draws a card to a players CardHand
     */
    public function handleButtons(
        Request $request,
        SessionInterface $session
    ): Response {

        // BUTTONS
        $playerDraw = $request->request->get('player');
        $playerStand = $request->request->get('player-stop');
        $dealerDraw = $request->request->get('dealer');
        $dealerStand = $request->request->get('dealer-stop');

        $game = $session->get('blackjack');
        $player = $game->players->findByType('Player');
        $dealer = $game->players->findByType('Dealer');

        // Button Actions
        if ($playerDraw) {
            $player->draw($game->deck);
            $player->calculateCardHand();
        } elseif ($dealerDraw) {
            $dealer->draw($game->deck);
            $dealer->calculateCardHand();
        } elseif ($playerStand) {
            /// MAKE IT THE DEALERS TURN ???
            $player->stop();
        } elseif ($dealerStand) {
            $game->blackjack();
        };

        return $this->redirectToRoute('game-plan');
    }

    /**
     * @Route("/game/test", name="game-test")
     */
    public function test(SessionInterface $session): Response
    {
        $game = $session->get('blackjack');

        $data = [
            'title' => 'Black jack TEST',
            'blackjack' => $game->players->findByType('Player')->getCurrentCardHand(),
            'dealer' => $game->players->findByType('Dealer'),
        ];
        return $this->render('game/test.html.twig', $data);
    }
}
