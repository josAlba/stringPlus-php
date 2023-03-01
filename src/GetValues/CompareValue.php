<?php

namespace Josalba\String\GetValues;

class CompareValue
{
    public static function equals(?string $original, ?string $value): bool
    {
        if ($original === null && $value === null) {
            return true;
        }

        if ($original === null && $value !== null) {
            return false;
        }

        if ($original !== null && $value === null) {
            return false;
        }

        return strcmp($original, $value) === 0;
    }
}