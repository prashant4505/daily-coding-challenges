<?php

/**
 * Problem:
 * Remove Duplicates from Sorted Array
 *
 * Description:
 * Given a sorted integer array, remove the duplicates in-place such that
 * each unique element appears only once. The relative order of the
 * elements should remain the same.
 *
 * Example:
 * Input:  [1, 1, 2]
 * Output: 2
 * Array:  [1, 2]
 *
 * Approach: Two-pointer (single pass)
 * Since the array is already sorted, duplicates always sit next to each
 * other. Keep a slow pointer at the last confirmed unique element and a
 * fast pointer that scans ahead. Whenever the fast pointer finds a value
 * different from the one at the slow pointer, it's a new unique element,
 * so move the slow pointer forward and copy that value into place.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];

$uniqueCount = removeDuplicates($nums);

echo "Unique Count: {$uniqueCount}\n";
echo 'Array: [' . implode(', ', array_slice($nums, 0, $uniqueCount)) . "]\n";

/**
 * Removes duplicates from a sorted array in-place and returns
 * the number of unique elements.
 *
 * @param int[] $nums Sorted array of integers, passed by reference.
 * @return int Count of unique elements.
 */
function removeDuplicates(array &$nums): int
{
    $totalElements = count($nums);

    // Nothing to do for an empty array.
    if ($totalElements === 0) {
        return 0;
    }

    // slowPointer marks the position of the last unique value found so far.
    $slowPointer = 0;

    // fastPointer scans the rest of the array looking for new values.
    for ($fastPointer = 1; $fastPointer < $totalElements; $fastPointer++) {
        if ($nums[$fastPointer] !== $nums[$slowPointer]) {
            $slowPointer++;
            $nums[$slowPointer] = $nums[$fastPointer];
        }
    }

    // slowPointer is a zero-based index, so the count is one more than it.
    return $slowPointer + 1;
}
