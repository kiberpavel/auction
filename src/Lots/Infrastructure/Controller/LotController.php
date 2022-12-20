<?php

namespace App\Lots\Infrastructure\Controller;

use App\Lots\Infrastructure\Service\LotCreation;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LotController
{
    public function __construct(private readonly LotCreation $lotCreation)
    {
    }

    #[Route('api/lot/create', methods: ['POST'])]
    public function addNewLot(Request $request): JsonResponse
    {
        return $this->lotCreation->createLot($request);
    }
}
