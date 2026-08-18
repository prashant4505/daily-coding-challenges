<?php

/**
 * Problem:
 * Reverse Linked List
 *
 * Given the head of a singly linked list, reverse the list
 * and return the new head.
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

function reverseLinkedList(?ListNode $head): ?ListNode
{
    $previous = null;

    while ($head !== null) {
        $next = $head->next;
        $head->next = $previous;
        $previous = $head;
        $head = $next;
    }

    return $previous;
}

function printLinkedList(?ListNode $head): void
{
    $values = [];

    while ($head !== null) {
        $values[] = $head->value;
        $head = $head->next;
    }

    echo implode(' -> ', $values);
}

$head = buildLinkedList([1, 2, 3, 4, 5]);
$reversedHead = reverseLinkedList($head);

printLinkedList($reversedHead);
