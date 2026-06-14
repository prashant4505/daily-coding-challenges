<?php

/**
 * Problem:
 * Contains Duplicate
 *
 * Description:
 * Given an integer array, determine whether any value appears
 * at least twice in the array. Return true if a duplicate exists,
 * otherwise return false.
 *
 * Example:
 * Input:  [1, 2, 3, 1]
 * Output: true
 *
 * Input:  [1, 2, 3, 4]
 * Output: false
 *
 * Time Complexity: O(n) - each element is visited once.
 * Space Complexity: O(n) - hash set may store up to n elements.
 */

$numbers = [1, 1, 1, 3, 3, 4, 3, 2, 4, 2];

$seenNumbers = [];
$hasDuplicate = false;

// Walk through the array, tracking every value we've already seen.
foreach ($numbers as $number) {
    if (isset($seenNumbers[$number])) {
        $hasDuplicate = true;
        break;
    }

    $seenNumbers[$number] = true;
}

echo $hasDuplicate ? "true" : "false";
