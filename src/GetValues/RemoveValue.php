<?php

namespace Josalba\String\GetValues;

use function preg_replace;

class RemoveValue
{
    /**
     * @param string $original
     * @param array<string> $words
     *
     * @return string
     */
    public static function getValue(string $original, array $words): string
    {
        foreach ($words as $word) {
            $original = preg_replace(
                '/((\w+)('.$word.')(\s+))|((\s+)('.$word.')(\w+))|((\s+)(\w+)('.$word.')(\w+))|((\w+)('.$word.')(\w+)(\s+))|((\s+)('.$word.'))|(('.$word.')(\s+))/i',
                '',
                $original
            );
        }

        return $original;
    }
}