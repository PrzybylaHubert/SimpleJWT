<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Service\UserService;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'app_api_', format: 'json')]
class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'registration', methods: ['POST'])]
    public function index(Request $request, UserService $userService, UserRepository $userRepository): JsonResponse
    {
        $parameters = $userService->decodeJson($request->getContent());

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->submit($parameters);

        $userService->validateUser($user);
        $userService->hashPassword($user);
        
        $userRepository->save($user, true);

        return new JsonResponse([
            'status' => 'success',
        ]);
    }
}
