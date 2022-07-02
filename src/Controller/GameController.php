<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use App\Classes\Card\Card;
use App\Classes\Game\CardHandManager;
use App\Classes\Game\GameManager;
use App\Classes\Game\Blackjack;
use App\Classes\Game\Player;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/gamePlan", name="game-plan")
     */
    public function plan(SessionInterface $session): Response
    {
        $game = $session->get('blackjack');

        $data = [
            'title' => 'Black jack',
            'blackjack' => $game,
            'dealer' => $game->dealer->getPlayer(),
            'player'  => $game->player->getPlayer(),
            'dealerWins' => $game->dealer->getTotalWins(),
            'playerWins' => $game->player->getTotalWins(),
        ];
        return $this->render('game/plan.html.twig', $data);
    }

    /**
     * @Route("/game/test", name="game-test")
     */
    public function test(SessionInterface $session): Response
    {
        $game = $session->get('blackjack');
        $data = [
            'title' => 'TEST Black jack',
            // SAME HANDS . . .
            'playerHand' => $game->player->draw($game->deck),
            'dealerHand' => $game->dealer->draw($game->deck),
            'deck' => $game->deck->getDeck(),
        ];
        return $this->render('game/test.html.twig', $data);
    }
}
