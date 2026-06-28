<?php

/**
 * Problem:
 * Merge Two Sorted Arrays
 *
 * Merge two sorted arrays into
 * one sorted array.
 *
 * Time Complexity: O(n + m)
 * Space Complexity: O(n + m)
 */

$array1 = [1, 3, 5];
$array2 = [2, 4, 6];

$result = [];

$i = 0;
$j = 0;

// Compare elements from both arrays
while ($i < count($array1) && $j < count($array2)) {

    if ($array1[$i] <= $array2[$j]) {
        $result[] = $array1[$i];
        $i++;
    } else {
        $result[] = $array2[$j];
        $j++;
    }
}

// Add remaining elements from array1
while ($i < count($array1)) {
    $result[] = $array1[$i];
    $i++;
}

// Add remaining elements from array2
while ($j < count($array2)) {
    $result[] = $array2[$j];
    $j++;
}

echo "[" . implode(", ", $result) . "]";