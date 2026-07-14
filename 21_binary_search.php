<?php

/**
 * Problem:
 * Binary Search
 *
 * Given a sorted array and a target value,
 * return the index of the target if found.
 * Otherwise, return -1.
 *
 * Time Complexity: O(log n)
 * Space Complexity: O(1)
 */

$numbers = [-1, 0, 3, 5, 9, 12];
$target = 9;

$left = 0;
$right = count($numbers) - 1;
$index = -1;

while ($left <= $right) {

    $middle = (int)(($left + $right) / 2);

    if ($numbers[$middle] === $target) {
        $index = $middle;
        break;
    }

    if ($numbers[$middle] < $target) {
        $left = $middle + 1;
    } else {
        $right = $middle - 1;
    }
}

echo $index;