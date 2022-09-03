<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;



class SecurityController extends AbstractController
{
    /***
     * Function to render login form
     * @Route("/proj/login", name="project_login)
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
        return $this->render('project/login/login.html.twig', $data);
    }

    /**
     * @Route("/proj/register/form", name="project_register_form")
     */
    public function register()
    {
        $data = [
            'title' => 'Login MVC Kmom10',
        ];
        return $this->render('project/login/register.html.twig', $data);
    }

    /**
     * @Route("/proj/admin/register/form", name="project_admin_register_form")
     */
    public function registerAsAdmin()
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
     * @Route("/proj/register", name="project_register_process")
     */
    public function registerProcess(
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
        return $this->redirectToRoute('project');
    }

    /**
     * @Route("/proj/users", name="project_users")
     */
    public function showAllUsers(
        UserRepository $userRepo
    ) {
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
    ) {
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
    ) {
        $entityManager = $doctrine->getManager();
        $user = $userRepo->findOneBy(array('username' => $username));

        $entityManager->remove($user);
        $entityManager->flush();
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
        $user = $userRepo->findOneBy(array('username' => $username));;

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
            is_string($image)
        ) {
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setImage($image);
        }
        $entityManager->flush();
        return $this->redirectToRoute('project_users');
    }

    /**
     * @Route("/proj/edit/form/{username}", name="project_edit_form")
     */
    public function editProfile()
    {
        $user = $this->getUser();
        $data = [
            'title' => 'Login MVC Kmom10',
            'user' => $user
        ];
        return $this->render('project/login/editProfile.html.twig', $data);
    }

    /**
     * @Route("/proj/edit/{username}", name="project_edit_process")
     */
    public function editProfileProcess(
        Request $request,
        ManagerRegistry $doctrine,
        string $username,
    ): Response {
        $entityManager = $doctrine->getManager();
        $user = $this->getUser();

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
            is_string($image)
        ) {
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setImage($image);
        }
        $entityManager->flush();
        return $this->redirectToRoute('project');
    }

    /**
     * @Route("/proj/logout", name="project_logout")
     */
    public function logout()
    {
        throw new \Exception('logout() should never be reached');
    }
}
