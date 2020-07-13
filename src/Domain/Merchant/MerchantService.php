<?php

declare(strict_types=1);

namespace App\Domain\Merchant;

final class MerchantService
{
    private MerchantDAOInterface $dao;

    public function __construct(MerchantDAOInterface $dao)
    {
        $this->dao = $dao;
    }

    public function find(string $code): ?MerchantDTO
    {
       return $this->dao->find($code);
    }
}
