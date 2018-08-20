<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $zero = 0;
    $min = 1;
    $max = 2000000000;

    $start = 0;
    $end = 0;

    if ($A < $zero || $A > $max) return 0;

    if ($A > $B) return 0;

    if ($B < $zero || $B > $max) return 0;

    if ($K < $min || $K > $max) return 0;

    $tmp = $A % $K;

    if ($tmp > 0)
    {
        $start = ($A - $tmp) / $K + 1;
    }
    else
    {
        $start = $A / $K;
    }

    $tmp = $B % $K;

    if ($tmp > 0)
    {
        $end = ($B - $tmp) / $K;
    }
    else
    {
        $end = $B / $K;
    }

    return $end - $start + 1;
}