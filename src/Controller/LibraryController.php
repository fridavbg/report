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
     * @Route("/library/show/{bookId}", name="book_by_id")
     */
    public function showBookById(
        BookRepository $bookRepository,
        int $bookId
    ): Response {
        $book = $bookRepository
            ->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $bookId
            );
        }

        $data = [
            'title' => 'Book by Id',
            'book' => $book
        ];

        return $this->render('library/readOne.html.twig', $data);
    }

    /**
     * @Route("/library/create/form", name="create_book_form")
     */
    public function createBookForm(): Response
    {
        $data = [
            'title' => 'Add a book'
        ];
        return $this->render('library/createForm.html.twig', $data);
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
        if (
            is_string($title) and
            is_string($author) and
            is_string($isbn) and
            is_string($description) and
            is_string($description) and
            is_string($image)
        ) {
            $book->setTitle($title);
            $book->setAuthor($author);
            $book->setISBN($isbn);
            $book->setDescription($description);
            $book->setImage($image);
        }
        $entityManager->persist($book);
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }

    /**
     * @Route("/library/update/form/{bookId}", name="update_book_form")
     */
    public function updateBookForm(
        int $bookId,
        ManagerRegistry $doctrine
    ): Response {
        $bookRepository = $doctrine->getRepository(Book::class);
        $book = $bookRepository
            ->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $bookId
            );
        }

        $data = [
            'book' => $book,
        ];

        return $this->render('library/editForm.html.twig', $data);
    }

    /**
     * @Route("/library/update/{bookId}", name="book_update_process")
     */
    public function updateBookProcess(
        Request $request,
        ManagerRegistry $doctrine,
        int $bookId,
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $bookId
            );
        }
        $title = $request->request->get('title');
        $author = $request->request->get('author');
        $isbn = $request->request->get('isbn');
        $description = $request->request->get('description');
        $image = $request->request->get('image');

        if (
            is_string($title) and
            is_string($author) and
            is_string($isbn) and
            is_string($description) and
            is_string($description) and
            is_string($image)
        ) {
            $book->setTitle($title);
            $book->setAuthor($author);
            $book->setISBN($isbn);
            $book->setDescription($description);
            $book->setImage($image);
        } else {
        }

        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }

    /**
     * @Route("/library/delete/{bookId}", name="book_delete_by_id")
     */
    public function deleteBookById(
        ManagerRegistry $doctrine,
        int $bookId
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $bookId
            );
        }
        
        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }
}
