<?php

namespace App\Classes\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Componenat\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CardHandManager
{
    public function calculateCardHand($cardHand)
    {
        $points = 0;
        for ($i = 0; $i < count($cardHand); $i++) {
            $cardValue = $cardHand[$i]->getValue();
            if (in_array($cardValue, ['A','J','Q','K'])) {
                // CHANGE POINTS ??
                $points += 11;
            } else {
                $points += (int)$cardValue;
            }
        }
        return $points;
    }
}
