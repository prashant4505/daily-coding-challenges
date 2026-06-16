<?php

/**
 * Problem:
 * Move Zeroes
 *
 * Description:
 * Given an integer array, move all zeroes to the end while maintaining
 * the relative order of the non-zero elements.
 *
 * Example:
 * Input:  [0, 1, 0, 3, 12]
 * Output: [1, 3, 12, 0, 0]
 *
 * Approach: Two-pointer (single pass)
 * Use a write pointer that only advances when a non-zero element is placed.
 * After all non-zero elements are moved forward, fill the rest with zeroes.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

$nums = [0, 1, 0, 3, 12];

// writePointer tracks the next position for a non-zero element.
$writePointer = 0;

foreach ($nums as $num) {
    if ($num !== 0) {
        $nums[$writePointer] = $num;
        $writePointer++;
    }
}

// Fill remaining positions with zeroes.
while ($writePointer < count($nums)) {
    $nums[$writePointer] = 0;
    $writePointer++;
}

print_r($nums);
