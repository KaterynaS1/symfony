<?php

namespace App\Service;

class ReadingTimeCalculator
{
    private const WORDS_PER_MINUTE = 200;

    public function calculate(string $content): int
    {
        $text = strip_tags($content);
        $wordCount = str_word_count($text);
        $minutes = (int) ceil($wordCount / self::WORDS_PER_MINUTE);

        return max(1, $minutes);
    }
}
