<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'blog_default')]
    public function start(): Response
    {
        return $this->redirectToRoute('app_blog_index');
    }

    #[Route('/default/{page}/{slug}', name: 'app_default', requirements: ['page' => '\d+'], defaults: ['slug' => 'chipio'],  methods: ['GET'])]
    public function index(Request $request, $slug, int $page): Response
    {
//        dd($request->query->get('data'));
        return $this->render('default/index.html.twig', [
            'slug' => $slug,
        ]);
    }
}
