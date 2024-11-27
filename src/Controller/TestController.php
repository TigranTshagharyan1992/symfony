<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'app_test')]
    public function index(BlogRepository $blogRepository, EntityManagerInterface $entityManager): Response
    {

        $blog = $blogRepository->findOneBy(['id' => 4]);
        $entityManager->refresh($blog);
        $entityManager->remove($blog);
        $entityManager->flush();


        $blog = (new Blog())
        ->setTitle('barnaul')
        ->setText('bilbo beginsyore');

        $entityManager->persist($blog);
        $entityManager->flush();

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
