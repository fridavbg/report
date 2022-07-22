<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;

class LibraryController extends AbstractController
{
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {
        $data = [
            'title' => 'Library',
        ];
        return $this->render('library/index.html.twig', $data);
    }

    /**
     * @Route("/library/show", name="library_show_all")
     */
    public function showAllBooks(
        BookRepository $bookRepository
    ): Response {
        $books = $bookRepository
            ->findAll();

        $data = [
            'books' => $books
        ];

        return $this->render('library/read.html.twig', $data);
    }

    /**
     * @Route("/library/create", name="create_book_form")
     */
    public function createBookForm(): Response
    {

        return $this->render('library/createForm.html.twig');
    }

    /**
     * @Route("/library/create", name="create_book_process")
     */
    public function createBookProcess(): Response
    {
        return $this->redirectToRoute('');
    }
}
