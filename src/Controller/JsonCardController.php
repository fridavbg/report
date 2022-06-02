<?php

namespace App\Controller;

use App\Classes\Card\Deck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JsonCardController extends AbstractController
{
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
