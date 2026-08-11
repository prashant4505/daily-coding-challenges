<?php

/**
 * Problem:
 * Non-overlapping Intervals
 *
 * Given an array of intervals, find the minimum number of intervals
 * that must be removed so that the remaining intervals are non-overlapping.
 *
 * Time Complexity: O(n log n)
 * Space Complexity: O(1)
 */

$intervals = [[1, 2], [2, 3], [3, 4], [1, 3]];

// Sort intervals by their end value so we can greedily keep the interval
// that finishes earliest, leaving the most room for the rest.
usort($intervals, function ($a, $b) {
    return $a[1] <=> $b[1];
});

$removals = 0;
$prevEnd = PHP_INT_MIN;

foreach ($intervals as $interval) {
    if ($interval[0] >= $prevEnd) {
        $prevEnd = $interval[1];
    } else {
        $removals++;
    }
}

echo $removals;
