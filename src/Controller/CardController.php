<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use App\Classes\Card\Deck2;
use App\Classes\Card\GameManager;
use App\Classes\Card\Player;
// use App\Classes\Card\GameManager;
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

        if (!$session->get("leftOverDeck")) {
            $session->set("leftOverDeck", new Deck());
            $session->set("cardHand", [new Deck()]);
        };

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
            'deck' => $deck->getDeck()
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/shuffle", name="card-shuffle")
     */
    public function shuffle(
        SessionInterface $session
    ): Response {

        $deck = new Deck();
        $session->set("leftOverDeck", $deck);
        $session->set("cardHand",  $deck->getCardHand());

        $data = [
            'title' => 'Shuffled Deck',
            'deck' => $deck->shuffleDeck(),
            'cardHand' => $deck->getCardHand(),
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="card-draw",  methods={"GET","POST"})
     * Pull one card and display leftOverDeck length
     */

    public function draw(
        SessionInterface $session
    ): Response {

        $data = [
            'title' => 'Draw a card',
            'cardHand' => $session->get('leftOverDeck')->getCards(1),
            'cards' => $session->get('leftOverDeck')->getDeck(),
        ];
        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/drawMultiple/{numOfCards}", name="card-draw-multiple", methods={"GET","POST"})
     * Pull N cards and display leftOverDeck length
     * 
     */

    public function drawMultiple(
        Request $request,
        SessionInterface $session,
        String $numOfCards
    ): Response {

        $numOfCards = $request->request->get('cards');

        $data = [
            'title' => 'Draw multiple card',
            'cardHand' => $session->get('leftOverDeck')->getCards(intval($numOfCards)),
            'cards' => $session->get('leftOverDeck')->getDeck(),
        ];
        return $this->render('card/drawMultiple.html.twig', $data);
    }

    /**
     * @Route("/card/deck/deal/{numOfPlayers}/{numOfCards}", name="deal", methods={"GET","POST"})
     * Display N cardsHands with N Cards 
     * display leftOverDeck length
     */

    public function deal(
        Request $request,
        SessionInterface $session,
        String $numOfCards,
        String $numOfPlayers,
    ): Response {

        $numOfPlayers = $request->request->get('players');
        $numOfCards = $request->request->get('cards');

        $game = new Player($numOfPlayers, $numOfCards);

        $data = [
            'title' => 'Draw multiple card with players',
            'cardHand' => $session->get('leftOverDeck')->getCards(intval($numOfCards)),
            'cards' => $session->get('leftOverDeck')->getDeck(),
            'game' => $game
        ];
        return $this->render('card/drawMultipleWithPlayers.html.twig', $data);
    }


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
