<?php

namespace App\Enums;

class ThriftSchedule
{
    const DAILY = 'daily';
    const WEEKLY = 'weekly';
    const MONTHLY = 'monthly';

    /**
     *  Return all trift schedule
     * @return array
     */
    public static function getAll(): array
    {
        return [self::DAILY, self::WEEKLY, self::MONTHLY];
    }
}
