<?php

namespace App\App\Infra\DAO;

use App\Domain\Merchant\MerchantDAOInterface;
use App\App\Utils\Enums\Merchant as MerchantStatus;
use App\Domain\Merchant\MerchantDTO;
use App\Domain\User\UserDTO;

final class Merchant implements MerchantDAOInterface
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
     * @param string $code
     * @return UserDTO|null
     */
    public function find(string $code): ?MerchantDTO
    {
        $stmt = $this->connection->prepare('
            SELECT * FROM merchants
            WHERE code = :code and status = :status
        ');


        $active = MerchantStatus::ACTIVE;

        $stmt->bindParam('code', $code);
        $stmt->bindParam('status', $active);
        $stmt->execute();

        $merchant = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$merchant) {
            return null;
        }

        return new MerchantDTO(
            $merchant['description'],
            $merchant['code'],
            new MerchantStatus($merchant['status']),
            $merchant['id']
        );
    }
}
