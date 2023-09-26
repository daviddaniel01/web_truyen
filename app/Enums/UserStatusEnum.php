<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserStatusEnum extends Enum
{
    public const HOAT_DONG = 0;
    public const DUNG_HOAT_DONG = 1;



    public static function getArrayView(): array
    {
        return [
            'Hoạt động' => self::HOAT_DONG,
            'Dừng hoạt động' => self::DUNG_HOAT_DONG,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
