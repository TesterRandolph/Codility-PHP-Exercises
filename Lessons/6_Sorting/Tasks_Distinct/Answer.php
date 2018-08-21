<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $minN = 0;
    $maxN = 100000;

    $minElement = -1000000;
    $maxElement = 1000000;

    $arrLength = sizeof($A);

    $tmpArray = [];

    if ($arrLength < $minN || $arrLength > $maxN) return 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < $minElement || $A[$i] > $maxElement ) return 0;

        $tmpArray[$A[$i]][] = $i;
    }

    return sizeof($tmpArray);
}