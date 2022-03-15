<?php

namespace App\Constants;

class PriorityConstant
{
    const HIGH   = 'Alto';
    const MEDIUM = 'Medio';
    const UNDER  = 'Bajo';
    const GROWTH = 'Desarrollo';

    const PRIORITY = [
        ['priority' => self::HIGH],
        ['priority' => self::MEDIUM],
        ['priority' => self::UNDER],
        ['priority' => self::GROWTH],
    ];
}
