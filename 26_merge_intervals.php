<?php

/**
 * Problem:
 * Merge Intervals
 *
 * Given an array of intervals where intervals[i] = [start, end],
 * merge all overlapping intervals and return an array of the
 * non-overlapping intervals that cover all the intervals in the input.
 *
 * Time Complexity: O(n log n)
 * Space Complexity: O(n)
 */

$intervals = [[1, 3], [2, 6], [8, 10], [15, 18]];

// Sort intervals by their start value.
usort($intervals, function ($a, $b) {
    return $a[0] <=> $b[0];
});

$merged = [$intervals[0]];

for ($i = 1; $i < count($intervals); $i++) {

    $current = $intervals[$i];
    $lastIndex = count($merged) - 1;

    // Overlapping interval, merge with the previous one.
    if ($current[0] <= $merged[$lastIndex][1]) {
        $merged[$lastIndex][1] = max($merged[$lastIndex][1], $current[1]);
    } else {
        $merged[] = $current;
    }
}

foreach ($merged as $interval) {
    echo '[' . implode(', ', $interval) . '] ';
}
