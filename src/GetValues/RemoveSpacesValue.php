<?php

namespace Josalba\String\GetValues;

class RemoveSpacesValue
{
    public static function getValue(string $original): string
    {
        if (empty($original)) {
            return $original;
        }

        return preg_replace("/\s+/", '', $original);
    }
}