<?php

namespace App\Lots\Infrastructure\API;

use App\Lots\Domain\Entity\Lot;
use App\Lots\Domain\Repository\LotRepositoryInterface;

class LotApi
{
    public function __construct(private readonly LotRepositoryInterface $lotRepository)
    {
    }

    public function exportLot(string $id): Lot
    {
        return $this->lotRepository->findById($id);
    }
}
