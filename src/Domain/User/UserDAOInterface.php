<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserDAOInterface
{
    public function findAll(): array;

    public function find(string $email);
}
