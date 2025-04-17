<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;


class VinylController extends AbstractController 
{
    #[Route('/')]
    public function homepage(): Response 
    {   
        $tracks = [
            'Gangstar\'s paradise - Coolio',
            'Waterfalls - TLC',
            'Creep - Radiohead',
            'Kiss from a Ross - Seal',
            'On Bended Knee - Boyz II men'
        ];

        return $this->render('vinyl/homepage.html.twig', [
            "title" => 'PB and Jams',
            "tracks" => $tracks
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse($slug = null): Response 
    {
        if($slug){
            $title = "Genres: " . u(str_replace('-',' ',$slug))->title(true);
        } else {
            $title = "All Genres";
        }


        return new Response($title);
    }

}