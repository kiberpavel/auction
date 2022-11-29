<?php

namespace App\Users\Domain\Entity;

use App\Shared\Domain\Security\AuthUserInterface;
use App\Shared\Domain\Service\UlidService;
use App\Users\Domain\Service\UserPasswordHasherInterface;
use App\Users\Infrastructure\Service\UserPasswordHasher;

class User implements AuthUserInterface
{
    private string $id;
    private string $email;
    private string $password;

    /**
     * @param string $email
     * @param string $password
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(
        string $email,
        string $password,
        UserPasswordHasherInterface $passwordHasher
    ) {
        $this->id = UlidService::generate();
        $this->email = $email;
        $this->setPassword($password, $passwordHasher);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    /**
     * @return void
     */
    public function eraseCredentials(): void
    {
    }

    /**
     * @return string
     */
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    /**
     * @param string $password
     * @param UserPasswordHasher $passwordHasher
     * @return void
     */
    public function setPassword(string $password, UserPasswordHasher $passwordHasher): void
    {
        $this->password = $passwordHasher->hash($this, $password);
    }
}
