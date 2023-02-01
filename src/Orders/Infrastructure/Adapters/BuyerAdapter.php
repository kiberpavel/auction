<?php

namespace App\Orders\Infrastructure\Adapters;

use App\Buyers\Domain\Entity\Buyer;
use App\Buyers\Infrastructure\API\BuyerApi;

class BuyerAdapter
{
    public function __construct(private readonly BuyerApi $buyerApi)
    {
    }

    public function importBuyer(string $id): Buyer
    {
        return $this->buyerApi->exportBuyer($id);
    }
}
