<?php

namespace App\Classes\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class CardHandCalculator
{
    /**
     * Calculate points of cardHand
     * @return integer
     */

    public function calculateCardHand($cardHand)
    {
        $points = 0;
        for ($i = 0; $i < count($cardHand); $i++) {
            $cardValue = $cardHand[$i]->getValue();
            if (in_array($cardValue, ['A','J','Q','K'])) {
                $points += 11;
            } else {
                $points += 10;
            }
        }
        return $points;
    }
}
