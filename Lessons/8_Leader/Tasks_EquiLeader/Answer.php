<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 1 || $arrLength > 100000) return 0;

    if ($arrLength === 1) return 1;

    $tmpArray = [];
    
    if ($arrLength % 2 === 1)
    {
        $halfLength = ceil($arrLength / 2);
    }
    else
    {
        $halfLength = $arrLength / 2 + 1;
    }

    $target = 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000000000 || $A[$i] > 1000000000) return 0;

        if (!isset($tmpArray[$A[$i]]))
        {
            $tmpArray[$A[$i]][0] = 1;
            $tmpArray[$A[$i]][1][] = [$i, 1];
            continue;
        }

        $tmpArray[$A[$i]][0]++;
        $tmpArray[$A[$i]][1][] = [$i, $tmpArray[$A[$i]][0]];

        if ($tmpArray[$A[$i]][0] >= $halfLength) $target = $A[$i];
    }

    $result = 0;

    for ($j = 0; $j < $tmpArray[$target][0]; $j++)
    {
        if ($tmpArray[$target][1][$j][0] % 2 === 1)
        {
            $tmpHalfLength = ceil($tmpArray[$target][1][$j][0] / 2);
        }
        else
        {
            $tmpHalfLength = $tmpArray[$target][1][$j][0] / 2 + 1;
        }

        if ($tmpArray[$target][1][$j][1] > $tmpHalfLength)
        {
            $result++;
        }
    }

    return $result;
}