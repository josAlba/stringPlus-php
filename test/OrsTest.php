<?php

use Josalba\String\StringPlus;
use PHPUnit\Framework\TestCase;

class OrsTest extends TestCase
{
    /**
     * @dataProvider dataTest
     *
     * @param array<string> $texts
     * @param string $result
     *
     * @return void
     */
    public function testOrs(array $texts, string $result): void
    {
        $text = StringPlus::ors(...$texts);

        $this->assertEquals($result, $text);
    }

    public function dataTest(): iterator
    {
        yield 'Case 1' => [
            [
                '',
                null,
                'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                ''
            ],
            'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ];
    }
}