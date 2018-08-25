<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    $tmpArray = [];

    if ($arrLength < 0 || $arrLength > 100000) return 0;

    for ($l = 0; $l < $arrLength; $l++)
    {
        if ($A[$l] < -2147483648 || $A[$l] > 2147483648) return 0;

        if ($A[$l] > 0) $tmpArray[] = [$l, $A[$l]];
    }

    $tmpArrLength = sizeof($tmpArray);

    if ($tmpArrLength < 3) return 0;

    for ($i = 0; $i < $tmpArrLength - 2; $i++)
    {
        $j = $i + 1;
        $separate = 1;

        $limit = $tmpArrLength - $j;

        while ($separate < $limit)
        {
            $nextJ = $j + $separate;

            if ($tmpArray[$i][1] + $tmpArray[$j][1] > $tmpArray[$nextJ][1] &&
                $tmpArray[$i][1] + $tmpArray[$nextJ][1] > $tmpArray[$j][1] &&
                $tmpArray[$j][1] + $tmpArray[$nextJ][1] > $tmpArray[$i][1])
            {
                return 1;
            }

            $j++;

            if ($nextJ === $tmpArrLength - 1)
            {
                $j = $i + 1;
                $separate++;
            }
        }
    }

   return 0;
}