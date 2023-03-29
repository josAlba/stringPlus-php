<?php

use Josalba\String\StringPlus;
use PHPUnit\Framework\TestCase;

class RemoveTest extends TestCase
{
    /**
     * @dataProvider dataTest
     *
     * @param string $text
     * @param string $remove
     * @param string $result
     *
     * @return void
     */
    public function testOrs(string $text, string $remove, string $result): void
    {
        $text = (string)StringPlus::create($text)->remove($remove);

        $this->assertEquals($result, $text);
    }

    public function dataTest(): iterator
    {
        yield 'Case 1' => [
            'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'Ipsum',
            'Lorem is simply dummy text of the printing and typesetting industry.',
        ];
    }
}