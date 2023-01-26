<?php

namespace App\Buyers\Infrastructure\Adapters;

use App\Lots\Domain\Entity\Lot;
use App\Lots\Infrastructure\API\LotApi;
use App\Users\Domain\Entity\User;
use App\Users\Infrastructure\API\UserApi;

class BuyerAdapter
{
    public function __construct(
        private readonly LotApi $lotApi,
        private readonly UserApi $userApi)
    {
    }

    public function importLot(string $id): Lot
    {
        return $this->lotApi->exportLot($id);
    }

    public function importUser(string $id): User
    {
        return $this->userApi->getUserData($id);
    }
}
