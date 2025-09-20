<?php
declare(strict_types = 1);

namespace App;

class StringHelper
{

    //$string = "З!и:муш:`ка: It`s Зима: Hello World! It`s very good";
//$string = "З!и:ма: It`s Зима: Hello World! It`s very good";
    private string $testString = 'это «Так» "просто"';
public function reverseString(string $string): string
{
    $words = explode(' ', $string);
    $reversedString = '';
    foreach ($words as $word) {
        $keywords = preg_split("/([\`\-]+)/", $word, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
        $reversedWord = '';
        foreach($keywords as $keyword) {
            $chars = preg_split('//u', $keyword, -1, PREG_SPLIT_NO_EMPTY);
            $reversedWord .= $this->reverseChars($chars);
        }
        $reversedString .=  empty($reversedString) ? $reversedWord : " $reversedWord";
    }
    return $reversedString;

}

private function reverseChars(array $chars): string
{
    $reversed = array_reverse($chars);

    $result = [];
    $endOfNonAlphaNum = [];

    foreach ($reversed as $rev) {

         if(!preg_match('/^[\w.-]+$/u', $rev)) {
            if(empty($result)) {
                $endOfNonAlphaNum[] = $rev;
            }
            continue;
         }

        while(null !== $char = array_shift($chars)) {

            if(!preg_match('/^[\w.-]+$/u', $char)) {
                array_push($result, $char);
                if($char === $rev) {
                    break;
                }
                continue;
            }
           
            $rev = mb_strtolower($rev);
            if (mb_strtoupper($char) === $char) {
                $rev = mb_strtoupper($rev);
            }
            array_push($result, $rev);
            break;
        }
    }

    if($endOfNonAlphaNum) {
        $result = array_merge($result, $endOfNonAlphaNum);
    }

    return implode($result);
}



}