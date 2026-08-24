<?php

/**
 * Problem:
 * Add Two Numbers
 *
 * You are given two non-empty linked lists representing two non-negative
 * integers. The digits are stored in reverse order, and each node
 * contains a single digit. Add the two numbers and return the sum as a
 * linked list.
 *
 * Walks both lists simultaneously, adding corresponding digits along
 * with any carry from the previous position, and appends the result
 * digit to a new list. Continues until both lists and the carry are
 * exhausted.
 *
 * Time Complexity: O(max(m, n))
 * Space Complexity: O(max(m, n))
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

function addTwoNumbers(?ListNode $l1, ?ListNode $l2): ?ListNode
{
    $dummy = new ListNode(0);
    $current = $dummy;
    $carry = 0;

    while ($l1 !== null || $l2 !== null || $carry !== 0) {
        $sum = $carry;

        if ($l1 !== null) {
            $sum += $l1->value;
            $l1 = $l1->next;
        }

        if ($l2 !== null) {
            $sum += $l2->value;
            $l2 = $l2->next;
        }

        $carry = intdiv($sum, 10);
        $current->next = new ListNode($sum % 10);
        $current = $current->next;
    }

    return $dummy->next;
}

$l1 = buildLinkedList([2, 4, 3]);
$l2 = buildLinkedList([5, 6, 4]);
printLinkedList(addTwoNumbers($l1, $l2));

$l1 = buildLinkedList([0]);
$l2 = buildLinkedList([0]);
printLinkedList(addTwoNumbers($l1, $l2));

$l1 = buildLinkedList([9, 9, 9, 9, 9, 9, 9]);
$l2 = buildLinkedList([9, 9, 9, 9]);
printLinkedList(addTwoNumbers($l1, $l2));
