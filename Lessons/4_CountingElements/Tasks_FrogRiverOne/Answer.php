<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $min = 1;
    $max = 100000;

    $arrLength = sizeof($A);

    if ($X < $min || $X > $max) return -1;

    if ($arrLength < $min || $arrLength > $max) return -1;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < $min || $A[$i] > $X) return -1;

        if ($A[$i] === $X) return $i;
    }

    return -1;
}