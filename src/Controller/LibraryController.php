<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
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
     * @Route("/book/create", name="create_book")
     */
    public function createbook(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $book = new Book();
        $book->setTitle('test');
        $book->setAuthor('test testson');

        // tell Doctrine you want to (eventually) save the book
        // (no queries yet)
        $entityManager->persist($book);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('library/create.html.twig');
    }
}
