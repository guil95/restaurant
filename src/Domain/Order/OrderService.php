<?php

declare(strict_types=1);

namespace App\Domain\Order;

use App\Domain\User\UserDTO;

final class OrderService
{
    public function create():OrderDTO
    {
        return new OrderDTO(
            rand(1,10),
            new UserDTO(
                'Guilherme',
                'guilherme@email.com'
            )
        );
    }
}
