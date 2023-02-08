<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'app_api_', format: 'json')]
class UserController extends AbstractController
{
    #[Route('/users', name: 'user', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findAll();
        return $this->json([
            'loggedUser' => $this->getUser(),
            'allUsers' => $users
        ]);
    }
}
