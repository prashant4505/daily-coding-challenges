<?php

/**
 * Problem:
 * Search Insert Position
 *
 * Given a sorted array and a target value,
 * return its index if found.
 * Otherwise, return the index where it
 * should be inserted.
 *
 * Time Complexity: O(log n)
 * Space Complexity: O(1)
 */

$numbers = [1, 3, 5, 6];
$target = 2;

$left = 0;
$right = count($numbers) - 1;

while ($left <= $right) {

    $middle = (int)(($left + $right) / 2);

    if ($numbers[$middle] === $target) {
        echo $middle;
        exit;
    }

    if ($numbers[$middle] < $target) {
        $left = $middle + 1;
    } else {
        $right = $middle - 1;
    }
}

// If not found, $left represents the correct insert position.
echo $left;