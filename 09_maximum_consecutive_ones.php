<?php

/**
 * Problem:
 * Maximum Consecutive Ones
 *
 * Description:
 * Given a binary array consisting of only 0s and 1s, find the maximum
 * number of consecutive 1s in the array.
 *
 * Example:
 * Input: [1, 1, 0, 1, 1, 1]
 * Output: 3
 *
 * Approach: Single Pass with streak tracking
 * Walk through the array once. Increment a running streak on every 1,
 * reset it to zero on every 0, and keep updating the best streak seen so far.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

$nums = [1, 1, 0, 1, 1, 1];

$currentStreak = 0;
$maxStreak = 0;

foreach ($nums as $num) {
    if ($num === 1) {
        $currentStreak++;

        // Update the best streak whenever the current one surpasses it.
        if ($currentStreak > $maxStreak) {
            $maxStreak = $currentStreak;
        }
    } else {
        // A 0 breaks the streak — reset and start fresh.
        $currentStreak = 0;
    }
}

echo $maxStreak;
