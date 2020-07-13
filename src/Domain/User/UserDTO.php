<?php

declare(strict_types=1);

namespace App\Domain\User;

final class UserDTO
{
    private string $name;
    private string $email;
    private string $merchant;
    private ?string $password;
    private ?int $id;

    public function __construct(
        string $name,
        string $email,
        string $merchant,
        ?string $password = null,
        ?int $id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->merchant = $merchant;
        $this->password = $password;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
     * @return string
     */
    public function getMerchant(): string
    {
        return $this->merchant;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'merchant' => $this->merchant
        ];
    }
}
