<?php

namespace App\Enums;

class ThriftActivityType
{
    const GROUP_OPEN = 'group_open';
    const MEMBER_JOINED = 'member_joined';
    const MEMBER_LEFT = 'member_left';
    const PAYMENT_STATUS = 'payment_status';
    const DEPOSIT_STATUS = 'deposit_status';
    const SLOT_STATUS = 'slot_status';
    const CHANGED_SLOTS = 'changed_slots';

    /**
     *  Return all trift activity types
     * @return array
     */
    public static function getAll(): array
    {
        return [
            self::GROUP_OPEN,
            self::MEMBER_JOINED,
            self::MEMBER_LEFT,
            self::PAYMENT_STATUS,
            self::DEPOSIT_STATUS,
            self::SLOT_STATUS,
            self::CHANGED_SLOTS
        ];
    }
}
