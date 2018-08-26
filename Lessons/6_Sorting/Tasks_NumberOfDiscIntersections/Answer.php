<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    // if ($arrLength < 0 || $arrLength > 100000) return 0;
    // if ($arrLength === 0 || $arrLength === 1) return 0;
    if ($arrLength <= 1 || $arrLength > 100000) return 0;

    $maxIndex = $arrLength - 1;
    $intersect = 0;

    $tmpArray = [];

    for ($i = 0; $i < $maxIndex; $i++)
    {
        if ($A[$i] < 0 || $A[$i] > 2147483647) return 0;

        $leftLimit = $i - $A[$i];
        $rightLimit = $i + $A[$i];

        if ($rightLimit >= $maxIndex)
        {
            $intersect += $maxIndex - $i;
        }
        else
        {
            $intersect += $rightLimit - $i;

            $tmpArray[] = [$i, $leftLimit, $rightLimit];
        }
    }

    $tmpLength = sizeof($tmpArray);

    if ($tmpLength > 0)
    {
        for ($j = 0; $j < $tmpLength; $j++)
        {
            for ($k = $tmpArray[$j][2] + 1; $k < $arrLength; $k++)
            {
                $kLeft = $k - $A[$k];

                if ($tmpArray[$j][2] < $kLeft)
                {
                    continue;
                }

                $intersect++;
            }
        }
    }

    if ($intersect > 10000000) return -1;

    return $intersect;
}