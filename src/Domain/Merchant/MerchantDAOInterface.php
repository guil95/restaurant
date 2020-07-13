<?php

declare(strict_types=1);

namespace App\Domain\Merchant;

interface MerchantDAOInterface
{
    public function find(string $code): ?MerchantDTO;
}
