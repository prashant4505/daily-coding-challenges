<?php

/**
 * Problem:
 * Kth Largest Element in an Array
 *
 * Given an integer array nums and an integer k, return the kth largest
 * element in the array (the kth largest in sorted order, not the kth
 * distinct element).
 *
 * Time Complexity: O(n log k)
 * Space Complexity: O(k)
 */

$nums = [3, 2, 1, 5, 6, 4];
$k = 2;

// Keep a min-heap of size k; the smallest element in it is always
// the kth largest seen so far, so anything smaller can be discarded.
$heap = new SplMinHeap();

foreach ($nums as $num) {
    $heap->insert($num);

    if ($heap->count() > $k) {
        $heap->extract();
    }
}

echo $heap->top();
