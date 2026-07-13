<?php

/**
 * Problem:
 * Intersection of Two Arrays
 *
 * Given two integer arrays,
 * return their unique intersection.
 *
 * Time Complexity: O(n + m)
 * Space Complexity: O(n)
 */

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];

$lookup = [];
$result = [];

// Store all unique values from the first array.
foreach ($array1 as $number) {
    $lookup[$number] = true;
}

// Check which values exist in both arrays.
foreach ($array2 as $number) {

    if (isset($lookup[$number])) {
        $result[$number] = true;
    }
}

// Print the unique intersection.
echo "[" . implode(", ", array_keys($result)) . "]";