<?php

declare(strict_types=1);

namespace App\Domain\Merchant;

use App\App\Utils\Enums\Merchant as MerchantStatus;

final class MerchantDTO
{
    private ?int $id;
    private string $code;
    private string $description;
    private MerchantStatus $status;


    public function __construct(
        string $description,
        string $code,
        MerchantStatus $status,
        ?int $id) {
        $this->description = $description;
        $this->code = $code;
        $this->status = $status;
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return MerchantStatus
     */
    public function getStatus(): MerchantStatus
    {
        return $this->status;
    }

}
