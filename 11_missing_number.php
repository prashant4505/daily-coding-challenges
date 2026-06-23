<?php

/**
 * Problem:
 * Missing Number
 *
 * Description:
 * Given an array containing n distinct numbers in the range [0, n],
 * return the only number in the range that is missing from the array.
 *
 * Example:
 * Input:  [3, 0, 1]
 * Output: 2
 *
 * Approach: Mathematical sum formula
 * If the array had no number missing, it would contain every value from
 * 0 to n, and the sum of those values would be n * (n + 1) / 2. Since
 * exactly one number is missing, subtracting the actual sum of the array
 * from that expected sum leaves the missing number behind.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

$nums = [9, 6, 4, 2, 3, 5, 7, 0, 1];

$missingNumber = findMissingNumber($nums);

echo "{$missingNumber}\n";

/**
 * Finds the missing number in an array of n distinct numbers
 * taken from the range [0, n].
 *
 * @param int[] $nums Array of distinct integers in the range [0, n].
 * @return int The missing number.
 */
function findMissingNumber(array $nums): int
{
    $n = count($nums);

    // Sum of 0..n if nothing were missing.
    $expectedSum = $n * ($n + 1) / 2;

    // Sum of the numbers actually present in the array.
    $actualSum = array_sum($nums);

    // Whatever's left over after removing the actual sum is the gap.
    return $expectedSum - $actualSum;
}
