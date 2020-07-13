<?php

namespace App\App\Infra\DAO;

use \App\Domain\User\UserDTO;
use App\Domain\User\UserDAOInterface;

final class User implements UserDAOInterface
{
    private \PDO $connection;

    /**
     * UserDTO constructor.
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        /**
         * @var $connection \PDO
         */
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->connection->prepare('
            SELECT u.name, u.email, m.code as merchant_code 
                FROM users u INNER JOIN merchants m
                ON u.merchant = m.id
                WHERE m.code = :merchant_code');

        $stmt->bindParam('merchant_code', $merchant);

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @param string $email
     * @return UserDTO|null
     */
    public function find(string $email): ?UserDTO
    {
        $stmt = $this->connection->prepare('
            SELECT *, m.code as merchant_code FROM users u 
                INNER JOIN merchants m
                ON u.merchant = m.id
                WHERE u.email = :email 
        ');

        $stmt->bindParam('email', $email);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new UserDTO(
            $user['name'],
            $user['email'],
            $user['merchant_code'],
            $user['password'],
            $user['id']
        );
    }
}
