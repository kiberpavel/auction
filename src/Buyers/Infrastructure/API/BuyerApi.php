<?php

namespace App\Buyers\Infrastructure\API;

use App\Buyers\Infrastructure\Service\BuyerSet;
use Symfony\Component\HttpFoundation\JsonResponse;

class BuyerApi
{
    public function __construct(private readonly BuyerSet $buyerSet)
    {
    }

    public function setBuyer(string $lotId, string $userId): JsonResponse
    {
        return $this->buyerSet->createOrUpdate(null, $lotId, $userId);
    }
}
