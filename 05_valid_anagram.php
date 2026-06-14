<?php

/**
 * Problem:
 * Check whether two strings are anagrams.
 *
 * Input:
 * listen
 * silent
 *
 * Output:
 * true
 */

$string1 = "listen";
$string2 = "silent";

if (strlen($string1) !== strlen($string2)) {
    echo "false";
    exit;
}

$characterCount = [];

// Count characters from first string.
for ($i = 0; $i < strlen($string1); $i++) {
    $character = $string1[$i];

    if (isset($characterCount[$character])) {
        $characterCount[$character]++;
    } else {
        $characterCount[$character] = 1;
    }
}

// Remove counts using second string.
for ($i = 0; $i < strlen($string2); $i++) {
    $character = $string2[$i];

    if (!isset($characterCount[$character])) {
        echo "false";
        exit;
    }

    $characterCount[$character]--;
}

// Verify all counts are zero.
foreach ($characterCount as $count) {
    if ($count !== 0) {
        echo "false";
        exit;
    }
}

echo "true";