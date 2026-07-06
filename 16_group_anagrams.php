<?php

/**
 * Problem:
 * Group Anagrams
 *
 * Given an array of strings, group
 * the anagrams together.
 *
 * Time Complexity: O(n * k log k)
 * Space Complexity: O(n * k)
 */

$words = ["eat", "tea", "tan", "ate", "nat", "bat"];

$groups = [];

foreach ($words as $word) {

    // Convert word into character array.
    $characters = str_split($word);

    // Sort the characters.
    sort($characters);

    // Create a unique key.
    $key = implode("", $characters);

    // Group words having the same key.
    if (!isset($groups[$key])) {
        $groups[$key] = [];
    }

    $groups[$key][] = $word;
}

// Print grouped anagrams.
echo "<pre>";
print_r(array_values($groups));
echo "</pre>";