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

    for ($i = 0; $i < $arrLength - 2; $i++)
    {
        $j = $i + 1;
        $separate = 1;

        $limit = $arrLength - $j;

        while ($separate < $limit)
        {
            if ($A[$i] + $A[$j] > $A[$j + $separate] &&
                $A[$i] + $A[$j + $separate] > $A[$j] &&
                $A[$j] + $A[$j + $separate] > $A[$i])
            {
                return 1;
            }

            $j++;

            if ($j + $separate === $arrLength)
            {
                $j = $i + 1;
                $separate++;
            }
        }
    }

   return 0;
}