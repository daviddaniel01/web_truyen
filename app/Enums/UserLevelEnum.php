<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserLevelEnum extends Enum
{
    public const ADMIN = 0;
    public const BIEN_TAP_VIEN = 1;
    public const NGUOI_DOC = 2;

    public static function getArrayView(): array
    {
        return [
            'Admin' => self::ADMIN,
            'Biên tập viên' => self::BIEN_TAP_VIEN,
            'Người đọc' => self::NGUOI_DOC,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
