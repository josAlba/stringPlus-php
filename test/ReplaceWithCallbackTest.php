<?php

use Josalba\String\StringPlus;
use PHPUnit\Framework\TestCase;

class ReplaceWithCallbackTest extends TestCase
{
    /**
     * @dataProvider dataTest
     *
     * @param string $text
     * @param array<string> $tags
     * @param callable $callback
     * @param string $result
     *
     * @return void
     */
    public function testWithCallback(string $text, array $tags, callable $callback, string $result): void
    {
        $text = StringPlus::create($text)->remplaceWithCallback($tags, $callback);

        $this->assertEquals($result, $text);
    }

    public function dataTest(): iterator
    {
        yield 'Case 1' => [
            'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            ['in'],
            static function ($tag, $context) {
                if ($context !== 'printing') {
                    return $tag;
                }

                return 'In';
            },
            'Lorem Ipsum is simply dummy text of the prInting and typesetting industry.',
        ];
    }
}