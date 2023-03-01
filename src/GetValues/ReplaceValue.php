<?php

namespace Josalba\String\GetValues;

class ReplaceValue
{
    public static function getValue(string $original, string|array $searchValue, string|array $replaceValue): string
    {
        if (empty($searchValue) || empty($replaceValue)) {
            return $original;
        }

        return str_replace($searchValue, $replaceValue, $original);
    }
}