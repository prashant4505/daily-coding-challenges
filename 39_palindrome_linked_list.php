<?php

/**
 * Problem:
 * Palindrome Linked List
 *
 * Given the head of a singly linked list, determine if it is a palindrome.
 *
 * Uses the fast/slow pointer technique to find the middle of the list,
 * reverses the second half in place, then compares it against the first
 * half node by node.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

class ListNode
{
    public $value;
    public ?ListNode $next = null;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

function buildLinkedList(array $values): ?ListNode
{
    $head = null;
    $tail = null;

    foreach ($values as $value) {
        $node = new ListNode($value);

        if ($head === null) {
            $head = $node;
        } else {
            $tail->next = $node;
        }

        $tail = $node;
    }

    return $head;
}

function reverseList(?ListNode $head): ?ListNode
{
    $prev = null;

    while ($head !== null) {
        $next = $head->next;
        $head->next = $prev;
        $prev = $head;
        $head = $next;
    }

    return $prev;
}

function isPalindrome(?ListNode $head): bool
{
    if ($head === null || $head->next === null) {
        return true;
    }

    $slow = $head;
    $fast = $head;

    while ($fast->next !== null && $fast->next->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    $secondHalf = reverseList($slow->next);
    $firstHalf = $head;

    $result = true;
    $secondHalfCopy = $secondHalf;

    while ($secondHalfCopy !== null) {
        if ($firstHalf->value !== $secondHalfCopy->value) {
            $result = false;
            break;
        }

        $firstHalf = $firstHalf->next;
        $secondHalfCopy = $secondHalfCopy->next;
    }

    $slow->next = reverseList($secondHalf);

    return $result;
}

var_dump(isPalindrome(buildLinkedList([1, 2, 2, 1])));
var_dump(isPalindrome(buildLinkedList([1, 2, 3])));
var_dump(isPalindrome(buildLinkedList([1])));
var_dump(isPalindrome(buildLinkedList([])));
