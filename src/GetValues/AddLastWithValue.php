<?php

namespace Josalba\String\GetValues;

class AddLastWithValue
{
    public static function getValue(string $original, string $value): string
    {
        if (empty($value)) {
            return $original;
        }

        return $original.$value;
    }
}