<?php

/**
 * Problem:
 * Swap Two Numbers Without Using a Third Variable
 *
 * Description:
 * Given two numbers, swap their values without using any extra
 * (third) variable to hold a temporary value.
 *
 * Example:
 * Input: a = 5, b = 10
 * Output: a = 10, b = 5
 *
 * Approach: Arithmetic Swap (Addition/Subtraction)
 * Add both numbers into $a, then derive the new $b by subtracting
 * the original $a from the sum, and finally derive the new $a by
 * subtracting the new $b from the sum.
 *
 * Time Complexity: O(1)
 * Space Complexity: O(1)
 */

$a = 5;
$b = 10;

echo "Before swap: a = $a, b = $b" . PHP_EOL;

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo "After swap: a = $a, b = $b" . PHP_EOL;
