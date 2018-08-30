<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 1 || $arrLength > 1000000) return 0;

    if ($arrLength === 1) return $A[0];

    $sumArray = [];

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000000 || $A[$i] > 1000000) return 0;

        // take N element/time
        $tmp = 0;
        $tmpArray = [];

        for ($j = $i; $j < $arrLength; $j++)
        {
            if ($j === $i)
            {
                $tmp = $A[$j];

                $tmpArray[0] = [$i, $j];
                $tmpArray[1] = $tmp;

                $sumArray[] = $tmpArray;

                continue;
            }
            
            $tmp += $A[$j];

            $tmpArray[0] = [$i, $j];
            $tmpArray[1] = $tmp;

            $sumArray[] = $tmpArray;
        }
    }

    $max = 0;
    $kLimit = sizeof($sumArray);

    for ($k = 0; $k < $kLimit; $k++)
    {
        if ($k === 0 || $sumArray[$k][1] > $max)
        {
            $max = $sumArray[$k][1];
        }
    }

    return $max;
}