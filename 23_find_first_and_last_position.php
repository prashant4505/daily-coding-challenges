<?php

/**
 * Problem:
 * Find First and Last Position of Element in Sorted Array
 *
 * Given a sorted array and a target value,
 * return the first and last occurrence of the target.
 * If the target does not exist, return [-1, -1].
 *
 * Time Complexity: O(log n)
 * Space Complexity: O(1)
 */

$numbers = [5, 7, 7, 8, 8, 10];
$target = 8;

function findFirstPosition(array $numbers, int $target): int
{
    $left = 0;
    $right = count($numbers) - 1;
    $result = -1;

    while ($left <= $right) {

        $middle = (int)(($left + $right) / 2);

        if ($numbers[$middle] == $target) {
            $result = $middle;
            $right = $middle - 1;
        } elseif ($numbers[$middle] < $target) {
            $left = $middle + 1;
        } else {
            $right = $middle - 1;
        }
    }

    return $result;
}

function findLastPosition(array $numbers, int $target): int
{
    $left = 0;
    $right = count($numbers) - 1;
    $result = -1;

    while ($left <= $right) {

        $middle = (int)(($left + $right) / 2);

        if ($numbers[$middle] == $target) {
            $result = $middle;
            $left = $middle + 1;
        } elseif ($numbers[$middle] < $target) {
            $left = $middle + 1;
        } else {
            $right = $middle - 1;
        }
    }

    return $result;
}

$firstPosition = findFirstPosition($numbers, $target);
$lastPosition = findLastPosition($numbers, $target);

echo "[" . $firstPosition . ", " . $lastPosition . "]";
