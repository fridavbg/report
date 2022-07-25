<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Form\BookFormType;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


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
    public function createBookForm(
        Request $request,
        SluggerInterface $slugger,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = new Book();

        $addBookForm = $this->createForm(BookFormType::class, $book);
        $addBookForm->handleRequest($request);

        if ($addBookForm->isSubmitted() && $addBookForm->isValid()) {
            /** @var UploadedFile $image */
            $title = $addBookForm->get('title')->getData();
            $author = $addBookForm->get('author')->getData();
            $isbn = $addBookForm->get('isbn')->getData();
            $description = $addBookForm->get('description')->getData();
            $imageFile = $addBookForm->get('image')->getData();

            // this condition is needed because the 'image' field is not required
            // so the image file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $imageFile->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    dd($e);
                }
                // updates the 'imageFilename' property to store the image file name
                // instead of its contents
                $book->setImage($newFilename);
            }

            // ... persist the $book variable or any other work
            $book->setTitle($title);
            $book->setAuthor($author);
            $book->setISBN($isbn);
            $book->setDescription($description);

            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('library_show_all');
        }
        $data = [
            'form' => $addBookForm->createView()
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
        Request $request,
        BookRepository $bookRepository,
        int $id,
        SluggerInterface $slugger,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $bookRepository
            ->find($id);
        $editBookForm = $this->createForm(BookFormType::class, $book);
        $editBookForm->handleRequest($request);


        if ($editBookForm->isSubmitted() && $editBookForm->isValid()) {
            /** @var UploadedFile $image */
            $title = $editBookForm->get('title')->getData();
            $author = $editBookForm->get('author')->getData();
            $isbn = $editBookForm->get('isbn')->getData();
            $description = $editBookForm->get('description')->getData();
            $imageFile = $editBookForm->get('image')->getData();

            // this condition is needed because the 'image' field is not required
            // so the image file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFile->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    dd($e);
                }
                // updates the 'imageFilename' property to store the image file name
                // instead of its contents
                $book->setImage($newFilename);
            }

            // ... persist the $book variable or any other work
            $book->setTitle($title);
            $book->setAuthor($author);
            $book->setISBN($isbn);
            $book->setDescription($description);

            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('library_show_all');
        }

        $data = [
            'book' => $book,
            'form' => $editBookForm->createView()
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
