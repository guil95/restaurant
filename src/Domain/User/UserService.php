<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\User\Exception\UserAuth;
use App\Domain\User\Exception\UserNotFound;

final class UserService
{
    private UserDAOInterface $dao;

    /**
     * UserService constructor.
     * @param UserDAOInterface $dao
     */
    public function __construct(UserDAOInterface $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function findAll(): array
    {
        $customers = $this->dao->findAll();

        if (!$customers) {
            throw new UserNotFound('Clientes não encontrados');
        }

        return $customers;
    }

    public function auth(string $email, string $password): UserDTO
    {
        /**
         * @var $userDTO UserDTO
         */
        $userDTO = $this->dao->find($email);

        if (!$userDTO) {
            throw new UserNotFound('Usuário não encontrado');
        }

        $verifyAuth = password_verify(
            $password,
            $userDTO->getPassword()
        );

        if (!$verifyAuth) {
            throw new UserAuth('Falha ao executar login');
        }

        return $userDTO;
    }
}
