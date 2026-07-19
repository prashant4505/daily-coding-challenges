<?php

/**
 * Problem:
 * Search in Rotated Sorted Array
 *
 * Given a rotated sorted array and a target value,
 * return the index of the target if found.
 * Otherwise, return -1.
 *
 * Time Complexity: O(log n)
 * Space Complexity: O(1)
 */

$numbers = [4, 5, 6, 7, 0, 1, 2];
$target = 0;

$left = 0;
$right = count($numbers) - 1;

while ($left <= $right) {

    $middle = (int)(($left + $right) / 2);

    if ($numbers[$middle] === $target) {
        echo $middle;
        exit;
    }

    // Left half is sorted.
    if ($numbers[$left] <= $numbers[$middle]) {

        if (
            $target >= $numbers[$left] &&
            $target < $numbers[$middle]
        ) {
            $right = $middle - 1;
        } else {
            $left = $middle + 1;
        }

    } else {

        // Right half is sorted.
        if (
            $target > $numbers[$middle] &&
            $target <= $numbers[$right]
        ) {
            $left = $middle + 1;
        } else {
            $right = $middle - 1;
        }
    }
}

echo -1;
