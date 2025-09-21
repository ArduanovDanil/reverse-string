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

    public function testReverseStringSomeSignAtTheEnd()
    {
        $reversed = $this->stringHelper->reverseString('Hello!?');
        $this->assertEquals('Olleh!?', $reversed);
    }

    public function testReverseStringDot()
    {
        $reversed = $this->stringHelper->reverseString('Hello.');
        $this->assertEquals('Olleh.', $reversed);
    }

    public function testReverseStringOnlyDots()
    {
        $reversed = $this->stringHelper->reverseString('String.with.dots');
        $this->assertEquals('Stod.htiw.gnirts', $reversed);
    }

    public function testReverseStringDots()
    {
        $reversed = $this->stringHelper->reverseString('Откройте site.dot.com в новом окне');
       $this->assertEquals('Етйоркто moc.tod.etis в мовон енко', $reversed);
    }

    public function testReverseStringStar()
    {
        $reversed = $this->stringHelper->reverseString('*star');
       $this->assertEquals('*rats', $reversed);
    }

    public function testReverseStringThreeDots()
    {
        $reversed = $this->stringHelper->reverseString('To be continued...');
        $this->assertEquals('Ot eb deunitnoc...', $reversed);
    }

    public function testReverseStringThreeDotsAndQuotes()
    {
        $reversed = $this->stringHelper->reverseString('«Так»...');
        $this->assertEquals('«Кат»...', $reversed);
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

}