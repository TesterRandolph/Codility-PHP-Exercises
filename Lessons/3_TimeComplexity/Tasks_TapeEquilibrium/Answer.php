<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);
    $total = 0;
    $check = 0;
    $tmp = 0;

    $minimal = -1;
    $difference = 0;

    if ($arrLength < 2 || $arrLength > 100000) return 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000 || $A[$i] > 1000) return 0;

        $total += $A[$i];
    }

    $check = $total / 2;

    for ($i = 0; $i < $arrLength; $i++)
    {
        $tmp += $A[$i];

        if ($tmp < $check)
        {
            $difference = $total - $tmp * 2;
        }
        else
        {
            $difference = $tmp * 2 - $total;
        }

        if ($minimal === -1 || $difference < $minimal)
        {
            $minimal = $difference;
        }
    }

    return $minimal;
}