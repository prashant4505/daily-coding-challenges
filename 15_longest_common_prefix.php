<?php

/**
 * Problem:
 * Longest Common Prefix
 *
 * Find the longest common prefix
 * among an array of strings.
 *
 * Time Complexity: O(n × m)
 * Space Complexity: O(1)
 */

$strings = ["flower", "flow", "flight"];

if (empty($strings)) {
    echo "";
    exit;
}

$prefix = $strings[0];

for ($i = 1; $i < count($strings); $i++) {

    while (strpos($strings[$i], $prefix) !== 0) {
        $prefix = substr($prefix, 0, -1);

        if ($prefix === "") {
            echo "";
            exit;
        }
    }
}

echo $prefix;