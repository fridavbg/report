<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;

class ProjectController extends AbstractController
{
    #[Route('/proj', name: 'project')]
    public function index(): Response
    {
        $data = [
            'title' => 'Project MVC Kmom10',
        ];
        return $this->render('project/index.html.twig', $data);
    }

    #[Route('/proj/about', name: 'project-about')]
    public function about(): Response
    {
        $data = [
            'title' => 'About MVC Kmom10'
        ];
        return $this->render('project/about.html.twig', $data);
    }
    #[Route('/proj/reset', name: 'project-reset')]
    public function reset(): Response
    {
        $data = [
            'title' => 'Reset DB MVC Kmom10'
        ];
        return $this->render('project/reset.html.twig', $data);
    }

    #[Route('/proj/test', name: 'project-test')]
    public function test(
        UserRepository $userRepository,
    ): Response {
        $users = $userRepository->findAll();

        foreach ($users as $user) {
            $user->getRoles();
        }

        $data = [
            'users' => $users
        ];
        return $this->render('project/test.html.twig', $data);
    }
}
