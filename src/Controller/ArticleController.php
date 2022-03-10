<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="homepage")
 */
class ArticleController extends AbstractController
{
    public function homepage(): Response
    {
       return new Response('My first page already.');
    }

    /**
     * @Route("/news/{slug}", name="show")
     */
    public function show($slug): Response
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste lake bacon!',
            'I \' m going on an all-astroid diet!',
            'I like bacon too. Buy some form my site. bacinsombacon.com'
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments
        ]);
    }
}
