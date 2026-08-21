<?php

/**
 * Problem:
 * Merge Two Sorted Lists
 *
 * You are given the heads of two sorted linked lists. Merge them into
 * one sorted linked list by splicing together the nodes of the two
 * lists, and return the head of the merged list.
 *
 * Uses a dummy head node and walks both lists, always attaching the
 * smaller current node to the merged list.
 *
 * Time Complexity: O(n + m)
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

function mergeTwoLists(?ListNode $list1, ?ListNode $list2): ?ListNode
{
    $dummy = new ListNode(0);
    $tail = $dummy;

    while ($list1 !== null && $list2 !== null) {
        if ($list1->value <= $list2->value) {
            $tail->next = $list1;
            $list1 = $list1->next;
        } else {
            $tail->next = $list2;
            $list2 = $list2->next;
        }

        $tail = $tail->next;
    }

    $tail->next = $list1 !== null ? $list1 : $list2;

    return $dummy->next;
}

$list1 = buildLinkedList([1, 2, 4]);
$list2 = buildLinkedList([1, 3, 4]);

printLinkedList(mergeTwoLists($list1, $list2));

$list1 = buildLinkedList([]);
$list2 = buildLinkedList([]);

printLinkedList(mergeTwoLists($list1, $list2));

$list1 = buildLinkedList([]);
$list2 = buildLinkedList([0]);

printLinkedList(mergeTwoLists($list1, $list2));
