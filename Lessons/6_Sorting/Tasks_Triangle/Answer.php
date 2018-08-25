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
            $nextJ = $j + $separate;

            if ($A[$i] + $A[$j] > $A[$nextJ] &&
                $A[$i] + $A[$nextJ] > $A[$j] &&
                $A[$j] + $A[$nextJ] > $A[$i])
            {
                return 1;
            }

            $j++;

            if ($nextJ === $arrLength - 1)
            {
                $j = $i + 1;
                $separate++;
            }
        }
    }

   return 0;
}