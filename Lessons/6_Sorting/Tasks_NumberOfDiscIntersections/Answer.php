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

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < 0 || $A[$i] > 2147483647) return 0;

        $leftLimit = $i - $A[$i];
        $rightLimit = $i + $A[$i];

        if ($rightLimit >= $maxIndex)
        {
            $intersect += $maxIndex - $i;

            if ($intersect > 10000000) return -1;

            continue;
        }
        else
        {
            $intersect += $rightLimit - $i;

            if ($intersect > 10000000) return -1;
        }

        for ($j = $rightLimit + 1; $j < $arrLength; $j++)
        {
            $jLeft = $j - $A[$j];

            if ($leftLimit > $jLeft || $rightLimit < $jLeft) continue;

            $intersect++;

            if ($intersect > 10000000) return -1;
        }
    }
    
    return $intersect;
}