<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);
    $start = 0;
    $min = 0;

    $endLoop = $arrLength - 1;

    if ($arrLength < 2 || $arrLength > 100000) return 0;
    
    for ($i = 0; $i < $endLoop; $i++)
    {
        if ($A[$i] < -10000 || $A[$i] > 10000) return 0;

        if (!isset($A[$i + 1])) break;

        if ($A[$i + 1] < -10000 || $A[$i + 1] > 10000) return 0;

        if ($i === 0)
        {
            $start = 0;
            $min = ($A[$i] + $A[$i + 1]) / 2;

            continue;
        }

        $tmp = ($A[$i] + $A[$i + 1]) / 2;

        if ($tmp < $min)
        {
            $start = $i;
            $min = $tmp;
        }

        if (isset($A[$i + 2]))
        {
            if ($A[$i + 2] < -10000 || $A[$i + 2] > 10000) return 0;

            $tmp = ($A[$i] + $A[$i + 1] + $A[$i + 2]) / 3;

            if ($tmp < $min)
            {
                $start = $i;
                $min = $tmp;
            }
        }
    }

    return $start;
}