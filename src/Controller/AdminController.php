<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/proj/admin/register/form", name="project_admin_register_form")
     */
    public function registerAsAdmin(): Response
    {
        $data = [
            'title' => 'Login MVC Kmom10',
        ];
        return $this->render('project/login/registerAsAdmin.html.twig', $data);
    }

    /**
     * @Route("/proj/admin/register", name="project_admin_register_process")
     */
    public function registerAsAdminProcess(
        Request $request,
        ManagerRegistry $doctrine,
    ): Response {
        $entityManager = $doctrine->getManager();

        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $image = $request->request->get('image');

        $user = new User();
        if (
            is_string($username) and
            is_string($password) and
            is_string($image)
        ) {
            $user->setUsername($username);
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($password);
            $user->setImage($image);
        }
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->redirectToRoute('project_users');
    }

    /**
     * @Route("/proj/users", name="project_users")
     */
    public function showAllUsers(
        UserRepository $userRepo
    ): Response {
        $admin = $this->getUser();
        $userRepo = $userRepo->findAll();

        $data = [
            'title' => 'Login MVC Kmom10',
            'admin' => $admin,
            'allUsers' => $userRepo
        ];
        return $this->render('project/login/users.html.twig', $data);
    }

    /**
     * @Route("/proj/admin/edit/form/{username}", name="project_admin_edit")
     */
    public function editProfileAsAdmin(
        UserRepository $userRepo,
        string $username
    ): Response {
        $admin = $userRepo->findOneBy(array('username' => 'admin'));
        $user = $userRepo->findOneBy(array('username' => $username));

        $data = [
            'title' => 'Login MVC Kmom10',
            'user' => $user,
            'admin' => $admin
        ];
        return $this->render('project/login/editProfileAsAdmin.html.twig', $data);
    }

    /**
     * @Route("/proj/admin/erase/{username}", name="project_admin_erase")
     */
    public function eraseProfileAsAdmin(
        ManagerRegistry $doctrine,
        UserRepository $userRepo,
        string $username
    ): Response {
        $entityManager = $doctrine->getManager();
        $user = $entityManager->getRepository(User::class)->findOneBy(array('username' => $username));

        if ($user) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('project_users');
    }

    /**
     * @Route("/proj/admin/edit/{username}", name="project_admin_edit_process")
     */
    public function editProfileAsAdminProcess(
        Request $request,
        ManagerRegistry $doctrine,
        string $username,
        UserRepository $userRepo,
    ): Response {
        $entityManager = $doctrine->getManager();
        $user = $userRepo->findOneBy(
            array('username' => $username)
        );

        if (!$username) {
            throw $this->createNotFoundException(
                'No user found with username: ' . $username
            );
        }
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $image = $request->request->get('image');

        if (
            is_string($username) and
            is_string($password) and
            is_string($image) and isset($user)
        ) {
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setImage($image);
        }
        $entityManager->flush();
        return $this->redirectToRoute('project_users');
    }
}
