<?php

namespace App\Orders\Infrastructure\Controller;

use App\Orders\Infrastructure\Service\OrderList;
use App\Orders\Infrastructure\Service\OrderRemove;
use App\Orders\Infrastructure\Service\OrderSet;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController
{
    public function __construct(
        private readonly OrderSet $orderSet,
        private readonly OrderRemove $orderRemove,
        private readonly OrderList $orderList)
    {
    }

    #[Route('api/order/set', methods: ['POST'])]
    public function setOrder(Request $request): JsonResponse
    {
        return $this->orderSet->addOrder($request);
    }

    #[Route('api/order/delete', methods: ['POST'])]
    public function removeOrder(Request $request): JsonResponse
    {
        return $this->orderRemove->remove($request);
    }

    #[Route('api/order/list', methods: ['GET'])]
    public function listOfOrders(): JsonResponse
    {
        return $this->orderList->output();
    }
}
