<?php

namespace App\Controller;

use App\Entity\User;
use App\Formatter\UserFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/users/show', name: 'app_user', methods: ['GET'])]
    public function showUser(UserFormatter $formatter): JsonResponse
    {
        $currentUser = $this->getUser();

        if (!$currentUser instanceof User) {
            return new JsonResponse([
                'data' => null,
                'messages' => null,
                'errors' => 'User not authenticated',
                'statusCode' => 401,
                'additionalData' => null
            ], 401);
        }

        return new JsonResponse([
            'data' => $formatter->format($currentUser),
            'messages' => null,
            'errors' => null,
            'statusCode' => 200,
            'additionalData' => null
        ]);
    }
}
