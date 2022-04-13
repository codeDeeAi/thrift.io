<?php

namespace App\Enums;

class ThriftSlotStatus
{
    const PAID = 'paid';
    const UNPAID = 'unpaid';

    /**
     *  Return all trift slot statuses
     * @return array
     */
    public static function getAll(): array
    {
        return [self::PAID, self::UNPAID];
    }
}
