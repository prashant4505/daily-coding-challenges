<?php

$string = "aabbcddeffcgh";

// Count occurrences of each character.
$characterCounts = [];

for ($i = 0; $i < strlen($string); $i++) {
    $character = $string[$i];

    if (isset($characterCounts[$character])) {
        $characterCounts[$character]++;
    } else {
        $characterCounts[$character] = 1;
    }
}

// Find the first character that appears only once.
$firstNonRepeatingCharacter = null;

for ($i = 0; $i < strlen($string); $i++) {
    $character = $string[$i];

    if ($characterCounts[$character] === 1) {
        $firstNonRepeatingCharacter = $character;
        break;
    }
}

if ($firstNonRepeatingCharacter !== null) {
    echo "First non-repeating character: " . $firstNonRepeatingCharacter;
} else {
    echo "No non-repeating character found.";
}