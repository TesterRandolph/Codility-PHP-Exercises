<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 0 || $arrLength > 100000) return 0;

    for ($l = 0; $l < $arrLength; $l++)
    {
        if ($A[$l] < -2147483648 || $A[$l] > 2147483648) return 0;
    }

    if ($arrLength % 2 === 1)
    {
        $half = ($arrLength - 1) / 2;
    }
    else
    {
        $half = $arrLength / 2;
    }

    $oHalf = $half - 1;

    for ($i = 0; $i < $half; $i++)
    {
        if ($i < $oHalf)
        {
            for ($j = $i + 1; $j < $half; $j++)
            {
                for ($k = $j + 1; $k < $arrLength; $k++)
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

        $l = $arrLength - $i - 1;

        for ($m = $l - 1; $m > $oHalf; $m--)
        {
            for ($n = $m - 1; $n >= 0; $n--)
            {
                if ($A[$l] + $A[$m] > $A[$n] &&
                    $A[$l] + $A[$n] > $A[$m] &&
                    $A[$m] + $A[$n] > $A[$l])
                {
                    return 1;
                }
            }
        }
   }

   return 0;
}