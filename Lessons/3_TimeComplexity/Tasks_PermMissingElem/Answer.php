<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $tmpArray = [];
    $arrLength = sizeof($A);

    $N = $arrLength + 1;
    
    if ($N < 0 || $arrLength > 100000) return 0;
    
    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < 1 || $A[$i] > $N) return 0;

        $tmpArray[$A[$i]][] = $i;

        if (sizeof($tmpArray[$A[$i]]) !== 1) return 0;
    }

    for ($i = 1; $i <= $N; $i++)
    {
        if (!isset($tmpArray[$i])) return $i;
    }
}