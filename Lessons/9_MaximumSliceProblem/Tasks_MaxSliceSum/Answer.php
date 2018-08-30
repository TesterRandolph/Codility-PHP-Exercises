<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 1 || $arrLength > 1000000) return 0;

    if ($arrLength === 1) return $A[0];

    $max = $A[0];
    $negativeCount = 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000000 || $A[$i] > 1000000) return 0;

        if ($A[$i] === 0) continue;

        if ($negativeCount !== 0 && $A[$i] < 0) continue;

        $tmp = 0;

        // take N element/time
        for ($j = $i; $j < $arrLength; $j++)
        {
            if ($A[$j] < 0)
            {
                if ($A[$j] > $max)
                {
                    $max = $A[$j];
                }

                $negativeCount++;
            }

            if ($j === $i)
            {
                $tmp = $A[$j];
            }
            else
            {
                $tmp += $A[$j];
            }

            if ($tmp > $max)
            {
                $max = $tmp;
            }
        }

        if ($negativeCount === $arrLength) break;
    }

    return $max;
}