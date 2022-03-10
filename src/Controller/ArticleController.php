<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="homepage")
 */
class ArticleController
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
        return new Response(printf('Future page to show article: %s', $slug));
    }
}
