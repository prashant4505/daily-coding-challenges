<?php

/**
 * Problem:
 * Meeting Rooms
 *
 * Given an array of meeting time intervals where intervals[i] = [start, end],
 * determine if a person could attend all meetings (i.e. no two intervals overlap).
 *
 * Time Complexity: O(n log n)
 * Space Complexity: O(1)
 */

$intervals = [[0, 30], [5, 10], [15, 20]];

// Sort intervals by their start value so overlaps only need to be
// checked against the interval that came immediately before.
usort($intervals, function ($a, $b) {
    return $a[0] <=> $b[0];
});

$canAttendAll = true;

for ($i = 1; $i < count($intervals); $i++) {
    if ($intervals[$i][0] < $intervals[$i - 1][1]) {
        $canAttendAll = false;
        break;
    }
}

echo $canAttendAll ? 'true' : 'false';
