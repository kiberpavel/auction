<?php

namespace App\Buyers\Infrastructure\Service;

use App\Buyers\Domain\Repository\BuyerRepositoryInterface;
use App\Buyers\Infrastructure\Adapters\BuyerAdapter;
use App\Shared\Infrastructure\Helper\ResponseMessage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BuyerSet
{
    public function __construct(
        private readonly BuyerRepositoryInterface $buyerRepository,
        private readonly BuyerAdapter $buyerAdapter,
        private readonly BuyerCreation $buyerCreation,
        private readonly BuyerUpdate $buyerUpdate)
    {
    }

    public function createOrUpdate(Request $request): JsonResponse
    {
        $lotId = $request->get('lotId');
        $userId = $request->get('userId');

        if (!$lotId || !$userId) {
            return new JsonResponse([
                'error' => ResponseMessage::PARAMS_ERROR,
            ], 400);
        }

        $lot = $this->buyerAdapter->importLot($lotId);
        $user = $this->buyerAdapter->importUser($userId);

        $buyer = $this->buyerRepository->getRecordByLot($lot);

        if (!empty($buyer)) {
            return $this->buyerUpdate->update($buyer, $userId);
        }

        return $this->buyerCreation->create($lot, $user);
    }
}
