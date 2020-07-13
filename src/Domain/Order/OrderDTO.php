<?php

declare(strict_types=1);

namespace App\Domain\Order;

use App\Domain\User\UserDTO;

final class OrderDTO
{
    private int $code;

    private UserDTO $customer;

    public function __construct(int $code, UserDTO $customer)
    {
        $this->code = $code;
        $this->customer = $customer;
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'customer' => $this->customer->toArray()
        ];
    }
}
