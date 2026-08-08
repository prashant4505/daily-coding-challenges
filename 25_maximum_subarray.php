<?php

/**
 * Problem:
 * Maximum Subarray (Kadane's Algorithm)
 *
 * Given an integer array, find the contiguous subarray
 * with the largest sum and return that sum.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

$numbers = [-2, 1, -3, 4, -1, 2, 1, -5, 4];

$currentSum = $numbers[0];
$maxSum = $numbers[0];

for ($i = 1; $i < count($numbers); $i++) {

    // Either extend the previous subarray or start a new one here.
    $currentSum = max($numbers[$i], $currentSum + $numbers[$i]);

    $maxSum = max($maxSum, $currentSum);
}

echo $maxSum;
