<?php

namespace Josalba\String\GetValues;

class RemoveTagsValue
{
    public static function getValue(string $original): string
    {
        return  strip_tags($original);
    }
}