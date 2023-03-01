<?php

namespace Josalba\String\GetValues;

class ConcatValue
{
    public static function getValue(string $original, ?string $value, string $separator): string
    {
        if (empty($value)) {
            return $original;
        }

        if (empty($original)) {
            $original .= $value;
        }

        $original .= $separator.$value;

        return $original;
    }
}