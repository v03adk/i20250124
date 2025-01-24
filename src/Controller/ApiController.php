<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/api/screen/{id}', name: 'app_api')]
    public function index(int $id): Response
    {
        return new Response('This is screen '.$id);
    }
}
