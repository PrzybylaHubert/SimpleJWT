<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'app_api_', format: 'json')]
class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(): JsonResponse
    {
        return $this->json([
        ]);
    }
}
