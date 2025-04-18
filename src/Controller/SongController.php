<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $loggerInterface): Response 
    {
        $song = [
            'id' => $id,
            'name' => 'waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];

        $loggerInterface->info('Returning Api response for song {song}',[
            'song' => $id
        ]);

        // return new JsonResponse($song);
        return $this->json($song);
    }
}