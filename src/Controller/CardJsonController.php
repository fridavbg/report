<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use App\Classes\Card\Deck2;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardJsonController extends AbstractController
{
    /**
     * @Route("/card/deck2", name="card-deck2")
     * create card/deck2 which is a deck with two jokers.
     * Display deck the same as card/deck. Tips try inheritance.
     * Try to recreate Deck ex DeckWith2Jokers extends Deck.
     */
    public function deckWithJokers(): Response
    {
        $deck = new Deck2();
        $deck->jokers();

        $data = [
            'title' => 'Deck with Jokers',
            'deck' => $deck->getDeck()
        ];
        return $this->render('card/deck2.html.twig', $data);
    }

    /**
     * @Route("/card/api/deck", name="api-deck")
     * Return deck as a JSON Structure
     */
    public function apiDeck(): Response
    {
        $deck = new Deck();
        $jsonDeck = $deck->getJson();

        $data = [
            'title' => 'Json Deck',
            'jsonDeck' => $jsonDeck
        ];
        return $this->render('card/jsonDeck.html.twig', $data);
    }
}
