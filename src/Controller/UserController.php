<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    #[Route('/proj/login', name: 'project-login')]
    public function new()
    {
        return new Response('Sounds like a GREAT feature for V2!');
    }
}
