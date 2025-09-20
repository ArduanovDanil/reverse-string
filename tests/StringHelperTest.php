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

    public function testReverseStringWithUpperCase()
    {
        $reversed = $this->stringHelper->reverseString('Hello World');
        $this->assertEquals('Olleh Dlrow', $reversed);
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