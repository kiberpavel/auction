<?php

namespace App\Buyers\Infrastructure\Service;

use App\Buyers\Domain\Repository\BuyerRepositoryInterface;
use App\Buyers\Infrastructure\Adapters\BuyerAdapter;
use App\Shared\Infrastructure\Helper\ResponseMessage;
use Symfony\Component\HttpFoundation\JsonResponse;

class BuyerUpdate
{
    public function __construct(
        private readonly BuyerRepositoryInterface $buyerRepository,
        private readonly BuyerAdapter $buyerAdapter)
    {
    }

    public function update(array $buyer, string $requestUserId): JsonResponse
    {
        $repositoryUserId = $buyer[0]->getUser()->getId();

        if ($requestUserId !== $repositoryUserId) {
            $newUserId = $this->buyerAdapter->importUser($requestUserId);
            $buyer[0]->setUser($newUserId);
            $this->buyerRepository->update();
        }

        return new JsonResponse([
            'message' => ResponseMessage::UPDATE_RECORD,
        ], 200);
    }
}
