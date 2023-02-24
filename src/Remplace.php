<?php

namespace Josalba\RemplaceCallback;

final class Remplace
{
    /**
     * @param string $originText
     * @param array<string> $tags
     * @param callable $callback
     *
     * @return string
     */
    public static function withCallback(string $originText, array $tags, callable $callback): string
    {
        $resultText = $originText;

        foreach ($tags as $tag) {
            $resultText = self::remplaceTagsToCallback($resultText, $tag, $callback);
        }

        return $resultText;
    }

    /**
     * @param string $originalText
     * @param string $tag
     * @param callable $callback Parameters { match, context }
     *
     * @return string
     */
    private static function remplaceTagsToCallback(string $originalText, string $tag, callable $callback): string
    {
        if (preg_match_all('/'.$tag.'/', $originalText) === 0) {
            return $originalText;
        }

        preg_match_all('/(\w+)'.$tag.'(\w+)/', $originalText, $context);

        $matchPosition = 0;

        return preg_replace_callback(
              '/'.$tag.'/',
            static function ($matchInPregRemplace) use ($callback, $context, &$matchPosition) {
                $contextValue = '';
                if (!empty($context) && array_key_exists($matchPosition, $context[0])) {
                    $contextValue = $context[0][$matchPosition] ?? '';
                }

                $matchPosition++;

                return $callback($matchInPregRemplace[0], $contextValue);
            }
            , $originalText,
        );
    }
}