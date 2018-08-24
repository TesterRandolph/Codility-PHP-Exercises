<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 0 || $arrLength > 100000) return 0;

    $iLimit = $arrLength - 2;
    $jLimit = $arrLength - 1;
    $kLimit = $arrLength;

    for ($l = 0; $l < $arrLength; $l++)
    {
        if ($A[$l] < -2147483648 || $A[$l] > 2147483648) return 0;
    }

    for ($i = 0; $i < $iLimit; $i++)
    {
        for ($j = $i + 1; $j < $jLimit; $j++)
        {
            for ($k = $j + 1; $k < $kLimit; $k++)
            {
                if ($A[$i] + $A[$j] > $A[$k] &&
                    $A[$i] + $A[$k] > $A[$j] &&
                    $A[$k] + $A[$j] > $A[$i])
                {
                    return 1;
                }
            }
        }
   }

   return 0;
}