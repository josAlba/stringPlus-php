<?php

use Josalba\String\StringPlus;
use PHPUnit\Framework\TestCase;

class ConcatTest extends TestCase
{
    public function testConcat(): void
    {
        $text = StringPlus::create('Lorem Ipsum')
            ->concat('is simply dummy text of the printing and typesetting industry.');

        $this->assertEquals('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', $text);
    }

    public function testConcatWithEmpty(): void
    {
        $text = StringPlus::create('Lorem Ipsum')
            ->concat('')
            ->concat(null)
            ->concat('is simply dummy text of the printing and typesetting industry.')
            ->concat('');

        $this->assertEquals('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', $text);
    }
}