<?php

namespace App\Lots\Domain\Entity;

use App\Shared\Domain\Service\UlidService;
use App\Users\Domain\Entity\User;

class Lot
{
    public const STATUS_IS_ACTIVE = 'active';
    public const STATUS_IS_INACTIVE = 'inactive';

    private string $id;
    private User $user;
    private string $status;
    private string $short_name;
    private float $price;
    private string $description;
    private string $image_url;

    public function __construct(
        User $user,
        string $status,
        string $short_name,
        float $price,
        string $description,
        string $image_url
    ) {
        $this->id = UlidService::generate();
        $this->user = $user;
        $this->status = $status;
        $this->short_name = $short_name;
        $this->price = $price;
        $this->description = $description;
        $this->image_url = $image_url;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getShortName(): string
    {
        return $this->short_name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImageUrl(): string
    {
        return $this->image_url;
    }
}