<?php

namespace App\Controller;

use App\Repository\ScreenOneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class ApiController extends AbstractController
{
    #[Route('/api/screenone', name: 'app_api_screen_one', methods: ['POST'])]
    public function screenOne(Request $request, ScreenOneRepository $screenOneRepository, SerializerInterface $serializer): Response
    {
        $content = json_decode($request->getContent(), true);

        $query = $content['query'];

        $results = $screenOneRepository->search($query);

        return new JsonResponse($serializer->serialize($results, 'json'));
    }
}
