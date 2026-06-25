<?php

/**
 * Problem:
 * Product of Array Except Self
 *
 * Description:
 * Given an integer array, return a new array such that each element
 * at index i is equal to the product of all the elements in the
 * original array except the one at index i.
 *
 * Note:
 * Division is not allowed.
 *
 * Example:
 * Input:  [1, 2, 3, 4]
 * Output: [24, 12, 8, 6]
 *
 * Approach: Prefix Product and Suffix Product
 * For every index i, the answer is (product of everything to its left)
 * multiplied by (product of everything to its right). We build a prefix
 * array where prefix[i] holds the running product of all elements before
 * i, then sweep from the right accumulating a suffix product and
 * multiplying it directly into prefix[i] to get the final result. This
 * avoids division entirely and only needs two linear passes.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 */

$nums = [1, 2, 3, 4];

$result = productExceptSelf($nums);

echo "[" . implode(", ", $result) . "]\n";

/**
 * Computes, for each index, the product of all other elements
 * in the array except the one at that index.
 *
 * @param int[] $nums Array of integers.
 * @return int[] Array where each index holds the product of all
 *               other elements except the one at that index.
 */
function productExceptSelf(array $nums): array
{
    $count = count($nums);
    $answer = array_fill(0, $count, 1);

    // First pass (left to right): answer[i] ends up holding the
    // product of every element to the left of i.
    $prefixProduct = 1;
    for ($i = 0; $i < $count; $i++) {
        $answer[$i] = $prefixProduct;
        $prefixProduct *= $nums[$i];
    }

    // Second pass (right to left): multiply in the product of every
    // element to the right of i, completing the answer for each index.
    $suffixProduct = 1;
    for ($i = $count - 1; $i >= 0; $i--) {
        $answer[$i] *= $suffixProduct;
        $suffixProduct *= $nums[$i];
    }

    return $answer;
}
