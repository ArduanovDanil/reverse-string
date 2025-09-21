<?php

declare(strict_types=1);

namespace App;

class StringHelper
{
    public function reverseString(string $string): string
    {
        $words = explode(' ', $string);
        $reversedString = '';
        foreach ($words as $word) {
            $keywords = preg_split("/([\`\-]+)/", $word, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            $reversedWord = '';
            foreach ($keywords as $keyword) {
                $chars = preg_split('//u', $keyword, -1, PREG_SPLIT_NO_EMPTY);
                $reversedWord .= $this->reverseChars($chars);
            }
            $reversedString .=  empty($reversedString) ? $reversedWord : " $reversedWord";
        }

        return $reversedString;
    }

    private function reverseChars(array $chars): string
    {
        $charsCount = count($chars);
        $nonAlphaNumStart = [];
        $nonAlphaNumEnd = [];
        $result = [];

        if (!preg_match('/^[\w-]+$/u', $chars[0])) {
            $nonAlphaNumStart[] = array_shift($chars);
        }

        $reversed = array_reverse($chars);

        foreach ($reversed as $rev) {
            if (empty($result) && !preg_match('/^[\w-]+$/u', $rev)) {
                array_unshift($nonAlphaNumEnd, $rev);
                continue;
            }

            while (null !== $char = array_shift($chars)) {
                $rev = mb_strtolower($rev);
                if (preg_match('/^\p{L}+$/u', $char) && mb_strtoupper($char) === $char) {
                    $rev = mb_strtoupper($rev);
                }
                array_push($result, $rev);
                break;
            }
        }

        if ($charsCount > count($result) && $nonAlphaNumStart) {
            $result = array_merge($nonAlphaNumStart, $result);
        }

        if ($charsCount > count($result) && $nonAlphaNumEnd) {
            $result = array_merge($result, $nonAlphaNumEnd);
        }

        return implode($result);
    }

}
