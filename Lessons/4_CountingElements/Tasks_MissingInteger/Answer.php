<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $tmpArray = [];
    $arrLength = sizeof($A);

    $max = 1;

    if ($arrLength < 1 || $arrLength > 100000) return 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000000 || $A[$i] > 1000000) return 0;

        if ($A[$i] > 0)
        {
            $tmpArray[$A[$i]][] = $i;

            if ($A[$i] > $max) $max = $A[$i];
        }
    }

    for ($i = 1; $i <= $max; $i++)
    {
        if (!isset($tmpArray[$i])) return $i;
    }
    
    return $max + 1;
}