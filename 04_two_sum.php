<?php

/**
 * Problem:
 * Find two numbers whose sum equals the target.
 *
 * Input:
 * [2, 7, 11, 15]
 * Target = 9
 *
 * Output:
 * [0, 1]
 */

$numbers = [2, 7, 11, 15];
$target = 9;

$seenNumbers = [];

foreach ($numbers as $index => $number) {
    $requiredNumber = $target - $number;

    if (isset($seenNumbers[$requiredNumber])) {
        echo "[" . $seenNumbers[$requiredNumber] . ", " . $index . "]";
        exit;
    }

    $seenNumbers[$number] = $index;
}