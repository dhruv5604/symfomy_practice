<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

use function Symfony\Component\String\u;


class VinylController extends AbstractController 
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(Environment $twig): Response 
    {   
        $tracks = [
            'Gangstar\'s paradise - Coolio',
            'Waterfalls - TLC',
            'Creep - Radiohead',
            'Kiss from a Ross - Seal',
            'On Bended Knee - Boyz II men'
        ];

        $html = $twig->render('vinyl/homepage.html.twig', [
            "title" => 'PB and Jams',
            "tracks" => $tracks
        ]);

        return new Response($html);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse($slug = null): Response 
    {
        $genre = $slug ? u(str_replace('-',' ',$slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [
            'genre'=>$genre,
        ]);
    }

}