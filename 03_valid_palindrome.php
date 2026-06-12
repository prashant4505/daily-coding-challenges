<?php

/**
 * Problem:
 * Check whether a string is a palindrome.
 *
 * Input: A man, a plan, a canal: Panama
 * Output: true
 */

$string = "A man, a plan, a canal: Panama";

// Remove non-alphanumeric characters
$cleanString = preg_replace('/[^a-zA-Z0-9]/', '', $string);

// Convert to lowercase
$cleanString = strtolower($cleanString);

$left = 0;
$right = strlen($cleanString) - 1;

$isPalindrome = true;

while ($left < $right) {
    if ($cleanString[$left] !== $cleanString[$right]) {
        $isPalindrome = false;
        break;
    }

    $left++;
    $right--;
}

echo $isPalindrome ? "true" : "false";