<?php

namespace Tests;

use PhpUnit\Framework\TestCase;
use App\StringHelper;

class StringHelperTest extends TestCase
{

    protected $stringHelper;

    protected function setUp(): void
    {
        $this->stringHelper = new StringHelper();
    }

    public function testReverseStringOnlyLowerCase()
    {
        $reversed = $this->stringHelper->reverseString('hello');
        $this->assertEquals('olleh', $reversed);
    }

    public function testReverseStringUpperCase()
    {
        $reversed = $this->stringHelper->reverseString('Hello World');
        $this->assertEquals('Olleh Dlrow', $reversed);
    }

    public function testReverseStringSeparators()
    {
        $reversed = $this->stringHelper->reverseString('Hello big-World with all-sep`aratOrs');
        $this->assertEquals('Olleh gib-Dlrow htiw lla-pes`srotAra', $reversed);
    }

    public function testReverseStringUnderscore()
    {
        $reversed = $this->stringHelper->reverseString('Hello underscore_in_word');
        $this->assertEquals('Olleh drow_ni_erocsrednu', $reversed);
    }

    public function testReverseStringDots()
    {
        $reversed = $this->stringHelper->reverseString('Hello String.with.dots');
        $this->assertEquals('Olleh Stod.htiw.gnirts', $reversed);
    }

    public function testReverseStringNumbers()
    {
        $reversed = $this->stringHelper->reverseString('Hello! 100 students at 123th Avenue');
        $this->assertEquals('Olleh! 001 stneduts ta ht321 Euneva', $reversed);
    }

    public function testReverseStringPunctuationMarks()
    {
        $reversed = $this->stringHelper->reverseString("is 'cold' now это «Так» \"просто\"");
        $this->assertEquals("si 'dloc' won отэ «Кат» \"отсорп\"", $reversed);
    }

    public function testReverseStringSomeSignAtTheEnd()
    {
        $reversed = $this->stringHelper->reverseString('Hello!?');
        $this->assertEquals('Olleh!?', $reversed);
    }


}