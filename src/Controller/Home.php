<?php

namespace App\Controller;

class Home
{
    #[Route('/home')]
    public function home(): Response
    {
        return('bezoeker/home.html.twig');
    }
}