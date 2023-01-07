<?php

namespace App\Lots\Infrastructure\Service;

use App\Lots\Domain\Repository\LotRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class LotsList extends AbstractController
{
    public function __construct(private readonly LotRepositoryInterface $lotRepository)
    {
    }

    public function outputLots(): JsonResponse
    {
        $lots = $this->lotRepository->getAllRecords();

        return $this->json($lots);
    }
}
