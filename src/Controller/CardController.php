<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use App\Classes\Card\Player;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardController extends AbstractController
{
    /**
     * @Route("/card", name="card-home")
     */
    public function home(SessionInterface $session): Response
    {
        $session->start();
        $session->clear();

        $session->set("deck", new Deck());
        $session->set("player", new Player());

        $data = [
            'title' => 'Deck-Home'
        ];
        return $this->render('card/home.html.twig', $data);
    }

    /**
     * @Route("/card/deck", name="card-deck")
     */
    public function deck(): Response
    {
        $deck = new Deck();
        $data = [
            'title' => 'Deck',
            'deck' => $deck->getCards()
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/shuffle", name="card-shuffle")
     * Shuffle deck []
     * If deck is empty, reset - new deck []
     */
    public function shuffle(
        SessionInterface $session
    ): Response {


        $deck = $session->get('deck')->getCards();

        if(count($deck) == 0) {
            $deck = $session->set('deck', new Deck());
            $player = $session->set('player', new Player());
            $player->drawCardsFromDeck(1, $deck);
        }

        $deck = $session->get('deck')->getCards();
        $player = $session->get('player');

        $data = [
            'title' => 'Shuffled Deck',
            'cardHand' => $session->get('player')->getCardHand(),
            'deck' => $deck,

        ];
        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="card-draw")
     * Pull one card and display deck length [x]
     * When deck is empty, reset with /shuffle []
     *  Save deck in session when draw or draw/:number is called update cardHand & deck [x]
     */

    public function draw(
        Request $request,
        SessionInterface $session
    ): Response {

        $currentDeck = $session->get('deck');
        $session->get('player')->drawCardsFromDeck(1, $currentDeck);

        if (count($currentDeck->getCards()) <= 0) {
            $session->set('deck', new Deck());
            $session->set('player', new Player());
            $session->get('player')->drawCardsFromDeck(1, $currentDeck);
        } 

        $data = [
            'title' => 'Draw a card',
            'deck' => $currentDeck->getCards(),
            'cardHand' => $session->get('player')->getCardHand(),
        ];
        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw/:number", name="card-multiple-draw")
     * Take user input of cards to be drawn [] 
     * update cardHand & deck []
     * When deck is empty, reset with /shuffle []
     * Save deck in session when draw or draw/:number is called update cardHand & deck []
     */

    public function drawMultiple(
        Request $request,
        SessionInterface $session
    ): Response {
        $data = [
            'title' => 'WIP',
        ];
        return $this->render('card/draw.html.twig', $data);
    }


    /**
     * @Route("/card/deck/deal/:players/:cards ", name="card-players")
     * Pull N card and give to N player []
     * Display each player cardHand []
     * Display length of deck []
     * When deck is empty, reset with /shuffle []
     * Tips player and cardHand class
     */

    public function deal(
        Request $request,
        SessionInterface $session
    ): Response {
        $data = [
            'title' => 'WIP',
        ];
        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck2/", name="card-deck2")
     * Display deck the same as card/deck. Tips try inheritance.
     * Try to recreate Deck ex DeckWith2Jokers extends Deck.
     */
    public function deck2(
        Request $request,
        SessionInterface $session
    ): Response {
        $data = [
            'title' => 'WIP',
        ];
        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/reset", name="card-reset")
     * Reset deck & clear session
     */

    public function reset(
        SessionInterface $session
    ): Response {
        $session->start();
        $session->clear();
        $session->set("deck", new Deck());
        $session->set("player", new Player());

        $data = [
            'title' => 'Reset',
        ];
        return $this->render('card/draw.html.twig', $data);
    }
}
