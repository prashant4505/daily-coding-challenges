<?php

/**
 * Problem:
 * Top K Frequent Elements
 *
 * Given an integer array and an integer k,
 * return the k most frequent elements.
 *
 * Time Complexity: O(n log n)
 * Space Complexity: O(n)
 */

$numbers = [1, 1, 1, 2, 2, 3];
$k = 2;

$frequency = [];

// Count frequency of each number.
foreach ($numbers as $number) {
    if (isset($frequency[$number])) {
        $frequency[$number]++;
    } else {
        $frequency[$number] = 1;
    }
}

// Sort by frequency in descending order.
arsort($frequency);

// Get the first k keys.
$result = array_slice(array_keys($frequency), 0, $k);

echo "[" . implode(", ", $result) . "]";