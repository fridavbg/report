<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /***
     * Function to render login form
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        // returns your User object, or null if the user is not authenticated
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $userRole = '';

        if ($user) {
            $userRole = $user->getRoles();
        }

        $data = [
            'test' => 'Login MVC Kmom10',
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'user' => $user,
            'userRole' => $userRole
        ];
        return $this->render('project/login.html.twig', $data);
    }

    /**
     * @Route("/proj/register", name="project_register")
     */
    public function register()
    {
        $data = [
            'title' => 'Login MVC Kmom10',
        ];
        return $this->render('project/register.html.twig', $data);
    }

    /**
     * @Route("/proj/logout", name="project_logout")
     */
    public function logout()
    {
        throw new \Exception('logout() should never be reached');
    }
}
