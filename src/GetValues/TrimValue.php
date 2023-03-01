<?php

namespace Josalba\String\GetValues;

class TrimValue
{
    public static function getValue(string $original): string
    {
        if (empty($original)) {
            return $original;
        }

        return ltrim(rtrim($original));
    }
}