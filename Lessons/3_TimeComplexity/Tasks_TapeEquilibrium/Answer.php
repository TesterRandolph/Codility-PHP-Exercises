<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);
    $total = 0;
    $difference = 0;

    if ($arrLength < 2 || $arrLength > 100000) return 0;

    if ($arrLength === 2)
    {
        $difference = $A[0] - $A[1];

        if ($difference < 0)
        {
            return 0 - $difference;
        }
        else
        {
            return $difference;
        }
    }

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000 || $A[$i] > 1000) return 0;

        $total += $A[$i];
    }

    $tmp_1 = 0;
    $tmp_2 = 0;
    $minimal = -1;

    $loopEnd = $arrLength - 1;

    for ($i = 0; $i < $loopEnd; $i++)
    {
        $tmp_1 += $A[$i];

        $tmp_2 = $total - $tmp_1;

        $difference = $tmp_1 - $tmp_2;

        if ($difference < 0)
        {
            $difference = 0 - $difference;
        }

        if ($minimal === -1 || $difference < $minimal)
        {
            $minimal = $difference;
        }
    }

    return $minimal;
}