<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use App\Classes\Card\Card;
use App\Classes\Game\CardHandManager;
use App\Classes\Game\GameManager;
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

        if (!$session->get("leftOverDeck")) {
            $session->set("leftOverDeck", new Deck());
            $session->set("cardHand", [new Deck()]);
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
        $deck = new Deck();
        $game = new CardHandManager();
        $twentyOne = new GameManager();
        $data = [
            'title' => 'Start Black jack',
            'cards' => $deck->getDeck(),
            'calculatedCardHand' => $game->calculateCardHand($deck->getCards(4)),
            'cardHand' => $deck->getCardHand(),
            'twentyOne' => $twentyOne->isTwentyOne([new Card('H', '3'), new Card('H', '10'), new Card('C', '8')])
        ];
        return $this->render('game/plan.html.twig', $data);
    }
}
