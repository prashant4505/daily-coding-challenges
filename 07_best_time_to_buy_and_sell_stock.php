<?php

/**
 * Problem:
 * Best Time to Buy and Sell Stock
 *
 * Description:
 * Given stock prices, determine the maximum possible profit.
 *
 * Example:
 * Input: [7, 1, 5, 3, 6, 4]
 * Output: 5
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

$prices = [7, 1, 5, 3, 6, 4];

// Keep track of the lowest price seen so far while scanning left to right.
// At each day, check if selling today (against that lowest price) beats
// the best profit found so far.
$lowestPriceSoFar = $prices[0];
$maxProfit = 0;

foreach ($prices as $price) {
    if ($price < $lowestPriceSoFar) {
        $lowestPriceSoFar = $price;
    } elseif ($price - $lowestPriceSoFar > $maxProfit) {
        $maxProfit = $price - $lowestPriceSoFar;
    }
}

echo $maxProfit;
