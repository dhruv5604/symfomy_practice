<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;


class VinylController {
    #[Route('/')]
    public function homepage(): Response {
        return new Response('<h1>Welcome to homepage</h1>');
    }

    #[Route('/browse/{slug}')]
    public function browse($slug = null): Response {

        if($slug){
            $title = "Genres: " . u(str_replace('-',' ',$slug))->title(true);
        } else {
            $title = "All Genres";
        }


        return new Response($title);
    }

}