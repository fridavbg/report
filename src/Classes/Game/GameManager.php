<?php

namespace App\Classes\Game;

use App\Classes\Game\CardHandCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class GameManager
{

    public function __construct()
    {
        $this->cardHandManager = new CardHandCalculator();
        $this->calculatedCardhand = $this->cardHandManager;
    }

    /**
     * Check if cardHand is TwentyOne
     * @return string
     */
    public function isTwentyOne($cardHand) {
        if($this->calculatedCardhand->calculateCardHand($cardHand) == 21 ) {
            return true;
        } else {
            return false;
        }
    }
}
