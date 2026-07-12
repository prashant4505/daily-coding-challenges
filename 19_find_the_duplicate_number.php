<?php

/**
 * Problem:
 * Find the Duplicate Number
 *
 * Given an array containing n + 1 integers
 * where each integer is between 1 and n,
 * find the duplicate number.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 */

$numbers = [1, 3, 4, 2, 2];

$visited = [];

foreach ($numbers as $number) {

    if (isset($visited[$number])) {
        echo $number;
        exit;
    }

    $visited[$number] = true;
}