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

        $data = [
            'title' => 'Black jack',
            'blackjack' => $game,
            'dealer' => $game->dealer->getPlayer(),
            'player'  => $game->player->getPlayer(),
            'dealerWins' => $game->dealer->getTotalWins(),
            'playerWins' => $game->player->getTotalWins(),
            'playerHand' => $game->player->getCurrentCardHand(),
            'dealerHand' => $game->dealer->getCurrentCardHand(),
            'cards' => $game->deck->getDeck()
        ];
        return $this->render('game/plan.html.twig', $data);
    }

    /**
     * @Route("/game/plan", name="draw-process", methods={"POST"})
     * Draws a card to a players CardHand
     */
    public function draw(
        Request $request,
        SessionInterface $session
    ): Response {

        // Indicate if it's the players or the dealers turn
        // Grab info from Buttons
        $player = $request->request->all();
        
        $game = $session->get('blackjack');

        $game->player->draw($game->deck);

        $game->dealer->draw($game->deck);

        // TEST if one card gets added to each cardHand 
        // dd($game);
        //dd($player);

        return $this->redirectToRoute('game-plan');
    }

    /**
     * @Route("/game/test", name="game-test")
     */
    public function test(SessionInterface $session): Response
    {
        $game = $session->get('blackjack');
        $data = [
            'title' => 'TEST Black jack',
            'playerHand' => $game->player->draw($game->deck),
            'dealerHand' => $game->dealer->draw($game->deck),
            'deck' => $game->deck->getDeck(),
        ];
        return $this->render('game/test.html.twig', $data);
    }
}
