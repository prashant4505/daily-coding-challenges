<?php

/**
 * Problem:
 * Linked List Cycle
 *
 * Given the head of a singly linked list, determine whether the
 * linked list has a cycle in it.
 *
 * Uses Floyd's Cycle Detection Algorithm (tortoise and hare):
 * a slow pointer moves one step at a time while a fast pointer
 * moves two steps at a time. If they ever meet, a cycle exists.
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

function makeCyclic(?ListNode $head, int $position): ?ListNode
{
    if ($head === null || $position < 0) {
        return $head;
    }

    $tail = $head;
    $cycleEntry = null;
    $index = 0;

    while ($tail->next !== null) {
        if ($index === $position) {
            $cycleEntry = $tail;
        }

        $tail = $tail->next;
        $index++;
    }

    if ($index === $position) {
        $cycleEntry = $tail;
    }

    $tail->next = $cycleEntry;

    return $head;
}

function hasCycle(?ListNode $head): bool
{
    $slow = $head;
    $fast = $head;

    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;

        if ($slow === $fast) {
            return true;
        }
    }

    return false;
}

$cyclicList = buildLinkedList([3, 2, 0, -4]);
$cyclicList = makeCyclic($cyclicList, 1);

$acyclicList = buildLinkedList([1, 2, 3, 4, 5]);

echo hasCycle($cyclicList) ? 'true' : 'false';
echo "\n";
echo hasCycle($acyclicList) ? 'true' : 'false';
