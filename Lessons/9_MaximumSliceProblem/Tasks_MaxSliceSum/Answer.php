<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 1 || $arrLength > 1000000) return 0;

    if ($arrLength === 1) return $A[0];

    $max = 0;
    $maxArray = [];

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000000 || $A[$i] > 1000000) return 0;

        // take N element/time
        $tmp = 0;

        for ($j = $i; $j < $arrLength; $j++)
        {
            if ($i === 0 && $j === $i)
            {
                $tmp = $A[$j];
                $max = $tmp;

                continue;
            }
            
            $tmp += $A[$j];

            if ($tmp > $max)
            {
                $max = $tmp;
            }
        }
    }

    return $max;
}