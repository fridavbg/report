<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /***
     * Function to render login form
     */
    public function login(): Response
    {
        $data = [
            'test' => 'Login Tjenmos Kmom10',
        ];
        return $this->render('project/login.html.twig', $data);
    }
}
