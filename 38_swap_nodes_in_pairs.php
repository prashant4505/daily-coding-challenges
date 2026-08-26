<?php

/**
 * Problem:
 * Swap Nodes in Pairs
 *
 * Given a linked list, swap every two adjacent nodes and return its head.
 * You must solve the problem without modifying the values in the nodes
 * (only the node links may be changed).
 *
 * Uses a dummy node ahead of the head so the first pair can be swapped
 * the same way as any other pair. Walks the list two nodes at a time,
 * rewiring the previous node, the pair, and the pair's successor before
 * advancing.
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

function printLinkedList(?ListNode $head): void
{
    $values = [];

    while ($head !== null) {
        $values[] = $head->value;
        $head = $head->next;
    }

    echo implode(' -> ', $values);
    echo "\n";
}

function swapPairs(?ListNode $head): ?ListNode
{
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $prev = $dummy;

    while ($prev->next !== null && $prev->next->next !== null) {
        $first = $prev->next;
        $second = $first->next;

        $first->next = $second->next;
        $second->next = $first;
        $prev->next = $second;

        $prev = $first;
    }

    return $dummy->next;
}

printLinkedList(swapPairs(buildLinkedList([1, 2, 3, 4])));
printLinkedList(swapPairs(buildLinkedList([1, 2, 3])));
printLinkedList(swapPairs(buildLinkedList([])));
