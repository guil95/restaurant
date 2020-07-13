<?php

declare(strict_types=1);

namespace App\App\Utils\Enums;

use guil95\Enum\Enum;

final class Merchant
{
    use Enum;

    /**
     * Active status
     */
    const ACTIVE = 'ACTIVE';

    /**
     * Inactive status
     */
    const INACTIVE = 'INACTIVE';
}
