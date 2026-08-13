<?php

/**
 * Problem:
 * Meeting Rooms II
 *
 * Given an array of meeting time intervals where intervals[i] = [start, end],
 * find the minimum number of conference rooms required so that all meetings
 * can be scheduled without overlapping.
 *
 * Time Complexity: O(n log n)
 * Space Complexity: O(n)
 */

$intervals = [[0, 30], [5, 10], [15, 20]];

$starts = array_map(fn ($interval) => $interval[0], $intervals);
$ends = array_map(fn ($interval) => $interval[1], $intervals);

sort($starts);
sort($ends);

// Sweep through start times; whenever a meeting starts before the earliest
// ongoing meeting has ended, another room is needed, otherwise a room frees up.
$roomsNeeded = 0;
$maxRooms = 0;
$endPointer = 0;

for ($i = 0; $i < count($starts); $i++) {
    if ($starts[$i] < $ends[$endPointer]) {
        $roomsNeeded++;
    } else {
        $roomsNeeded--;
        $endPointer++;
    }

    $maxRooms = max($maxRooms, $roomsNeeded);
}

echo $maxRooms;
