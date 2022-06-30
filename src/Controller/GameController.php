<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game-home")
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
        $data = [
            'title' => 'Start Black jack',
            'cards' => $deck->getDeck(),
            'cardHand' => $deck->getCardHand()
        ];
        return $this->render('game/plan.html.twig', $data);
    }
}