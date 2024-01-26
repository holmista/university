<?php

namespace App\Traits;

trait EnumUtils
{
    public static function getValues($is_model=false): array
    {
        $values = [];
        foreach (self::cases() as $case) {
            $values[] = $case->value;
            if ($is_model) {
                $values[] = addslashes($case->value);
            }
        }
        return $values;
    }

    public static function getRandomValue(): string
    {
        $values = self::getValues();
        return $values[array_rand($values)];
    }
}
