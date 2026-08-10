<?php

/**
 * Problem:
 * Insert Interval
 *
 * Given a set of non-overlapping intervals sorted by their start value,
 * insert a new interval into the list, merging it with any overlapping
 * intervals so the result remains sorted and non-overlapping.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 */

$intervals = [[1, 3], [6, 9]];
$newInterval = [2, 5];

$result = [];
$i = 0;
$n = count($intervals);

// Add all intervals that end before the new interval starts.
while ($i < $n && $intervals[$i][1] < $newInterval[0]) {
    $result[] = $intervals[$i];
    $i++;
}

// Merge all intervals that overlap with the new interval.
while ($i < $n && $intervals[$i][0] <= $newInterval[1]) {
    $newInterval[0] = min($newInterval[0], $intervals[$i][0]);
    $newInterval[1] = max($newInterval[1], $intervals[$i][1]);
    $i++;
}
$result[] = $newInterval;

// Add all the remaining intervals.
while ($i < $n) {
    $result[] = $intervals[$i];
    $i++;
}

foreach ($result as $interval) {
    echo '[' . implode(', ', $interval) . '] ';
}
