<?php

namespace App\Users\Infrastructure\Controller;

use App\Users\Infrastructure\Service\SocialAuth;
use App\Users\Infrastructure\Service\UserRegistration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRegistration $userRegistration,
        private readonly SocialAuth $socialAuth)
    {
    }

    #[Route('api/register', methods: ['POST'])]
    public function register(Request $request): JsonResponse
    {
        return $this->userRegistration->register($request);
    }

    #[Route('api/social-login', methods: ['POST'])]
    public function socialLogin(Request $request): JsonResponse
    {
        return $this->socialAuth->auth($request);
    }
}
