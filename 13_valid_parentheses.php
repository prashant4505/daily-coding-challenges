<?php

/**
 * Problem:
 * Valid Parentheses
 *
 * Determine whether the given string
 * contains valid matching brackets.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 */

$string = "{[]}";

$stack = [];

$matchingBrackets = [
    ')' => '(',
    '}' => '{',
    ']' => '['
];

for ($i = 0; $i < strlen($string); $i++) {
    $character = $string[$i];

    // Opening bracket
    if (
        $character === '(' ||
        $character === '{' ||
        $character === '['
    ) {
        $stack[] = $character;
        continue;
    }

    // Stack should not be empty
    if (empty($stack)) {
        echo "false";
        exit;
    }

    $lastOpeningBracket = array_pop($stack);

    if ($lastOpeningBracket !== $matchingBrackets[$character]) {
        echo "false";
        exit;
    }
}

// If stack is empty, brackets are balanced
echo empty($stack) ? "true" : "false";