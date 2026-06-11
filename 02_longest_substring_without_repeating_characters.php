<?php

/**
 * Problem:
 * Find the length of the longest substring
 * without repeating characters.
 *
 * Input: abcabcbb
 * Output: 3
 */

$string = "abcabcbb";

$seenCharacters = [];
$start = 0;
$maxLength = 0;

for ($end = 0; $end < strlen($string); $end++) {
    $currentCharacter = $string[$end];

    // If character already exists in current window,
    // move the start pointer.
    if (
        isset($seenCharacters[$currentCharacter]) &&
        $seenCharacters[$currentCharacter] >= $start
    ) {
        $start = $seenCharacters[$currentCharacter] + 1;
    }

    // Store latest position of current character.
    $seenCharacters[$currentCharacter] = $end;

    // Calculate current window length.
    $currentLength = $end - $start + 1;

    if ($currentLength > $maxLength) {
        $maxLength = $currentLength;
    }
}

echo "Length of longest substring without repeating characters: " . $maxLength;