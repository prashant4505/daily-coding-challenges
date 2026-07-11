<?php

/**
 * Problem:
 * Longest Consecutive Sequence
 *
 * Given an unsorted array of integers,
 * find the length of the longest consecutive sequence.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 */

$numbers = [100, 4, 200, 1, 3, 2];

$numberSet = [];

// Store every number for fast lookup.
foreach ($numbers as $number) {
    $numberSet[$number] = true;
}

$longestSequence = 0;

foreach ($numbers as $number) {

    // Start only if this is the beginning of a sequence.
    if (!isset($numberSet[$number - 1])) {

        $currentNumber = $number;
        $currentLength = 1;

        while (isset($numberSet[$currentNumber + 1])) {
            $currentNumber++;
            $currentLength++;
        }

        if ($currentLength > $longestSequence) {
            $longestSequence = $currentLength;
        }
    }
}

echo $longestSequence;