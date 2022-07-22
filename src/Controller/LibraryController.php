<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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

        return $this->render('library/readAll.html.twig', $data);
    }

    /**
     * @Route("/library/show/{id}", name="book_by_id")
     */
    public function showBookById(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository
            ->find($id);
        $data = [
            'book' => $book
        ];

        return $this->render('library/readOne.html.twig', $data);
    }

    /**
     * @Route("/library/create/form", name="create_book_form")
     */
    public function createBookForm(): Response
    {

        return $this->render('library/createForm.html.twig');
    }

    /**
     * @Route("/library/create", name="create_book_process")
     */
    public function createBookProcess(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $title = $request->request->get('title');
        $author = $request->request->get('author');
        $isbn = $request->request->get('isbn');
        $description = $request->request->get('description');
        $image = $request->request->get('image');

        $book = new Book();
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setISBN($isbn);
        $book->setDescription($description);
        $book->setImage($image);

        $entityManager->persist($book);
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }

    /**
     * @Route("/library/update/form/{id}", name="update_book_form")
     */
    public function updateBookForm(
        BookRepository $bookRepository,
        int $id
    ): Response
    {
        $book = $bookRepository
            ->find($id);
        $data = [
            'book' => $book
        ];
        return $this->render('library/editForm.html.twig', $data);
    }

    /**
     * @Route("/library/update/{id}", name="book_update_process")
     */
    public function updateBookProcess(
        Request $request,
        ManagerRegistry $doctrine,
        int $id,
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $id
            );
        }
        $title = $request->request->get('title');
        $author = $request->request->get('author');
        $isbn = $request->request->get('isbn');
        $description = $request->request->get('description');
        $image = $request->request->get('image');

        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setISBN($isbn);
        $book->setDescription($description);
        $book->setImage($image);
        
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }

    /**
     * @Route("/library/delete/{id}", name="book_delete_by_id")
     */
    public function deleteBookById(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $id
            );
        }

        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }
}
