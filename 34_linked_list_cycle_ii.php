<?php

/**
 * Problem:
 * Linked List Cycle II
 *
 * Given the head of a singly linked list, return the node where the
 * cycle begins. If there is no cycle, return null.
 *
 * Uses Floyd's Cycle Detection Algorithm (tortoise and hare):
 * once the slow and fast pointers meet inside the cycle, reset one
 * pointer to the head and advance both one step at a time — they
 * will meet again exactly at the start of the cycle.
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

function detectCycle(?ListNode $head): ?ListNode
{
    $slow = $head;
    $fast = $head;

    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;

        if ($slow === $fast) {
            $pointer = $head;

            while ($pointer !== $slow) {
                $pointer = $pointer->next;
                $slow = $slow->next;
            }

            return $pointer;
        }
    }

    return null;
}

$cyclicList = buildLinkedList([3, 2, 0, -4]);
$cyclicList = makeCyclic($cyclicList, 1);

$acyclicList = buildLinkedList([1, 2, 3, 4, 5]);

$entry = detectCycle($cyclicList);
echo $entry !== null ? $entry->value : 'null';
echo "\n";

$entry = detectCycle($acyclicList);
echo $entry !== null ? $entry->value : 'null';
