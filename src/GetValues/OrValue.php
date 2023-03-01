<?php

namespace Josalba\String\GetValues;

class OrValue
{
    public static function getValue(string $original, ?string $value): string
    {
        if (empty($value)) {
            return $original;
        }

        return $value;
    }
}