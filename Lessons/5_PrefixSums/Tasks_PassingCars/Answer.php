<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    $counter = 0;

    $total = 0;

    if ($arrLength < 1 || $arrLength > 100000) return -1;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] === 0)
        {
            $counter++;
        }
        elseif ($A[$i] === 1)
        {
            $total += $counter;
        }
        else
        {
            return -1;
        }
    }

    return $total;
}