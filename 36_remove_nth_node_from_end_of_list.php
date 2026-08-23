<?php

/**
 * Problem:
 * Remove Nth Node From End of List
 *
 * Given the head of a linked list, remove the nth node from the end
 * of the list and return its head.
 *
 * Uses two pointers separated by n nodes: advance the fast pointer
 * n steps ahead, then move both pointers together until fast reaches
 * the end, leaving slow just before the node to remove.
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

function removeNthFromEnd(?ListNode $head, int $n): ?ListNode
{
    $dummy = new ListNode(0);
    $dummy->next = $head;

    $fast = $dummy;
    $slow = $dummy;

    for ($i = 0; $i < $n; $i++) {
        $fast = $fast->next;
    }

    while ($fast->next !== null) {
        $fast = $fast->next;
        $slow = $slow->next;
    }

    $slow->next = $slow->next->next;

    return $dummy->next;
}

$list = buildLinkedList([1, 2, 3, 4, 5]);
printLinkedList(removeNthFromEnd($list, 2));

$list = buildLinkedList([1]);
printLinkedList(removeNthFromEnd($list, 1));

$list = buildLinkedList([1, 2]);
printLinkedList(removeNthFromEnd($list, 2));
