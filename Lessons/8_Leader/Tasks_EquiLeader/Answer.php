<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 1 || $arrLength > 100000) return 0;

    if ($arrLength === 1) return 0;

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
            $tmpArray[$A[$i]][1][$i] = 1;
            continue;
        }

        $tmpArray[$A[$i]][0]++;
        $tmpArray[$A[$i]][1][$i] = $tmpArray[$A[$i]][0];

        if ($tmpArray[$A[$i]][0] >= $halfLength) $target = $A[$i];
    }

    $result = 0;
    $jLimit = $arrLength - 1;
    $checker = 0;

    for ($j = 0; $j < $jLimit; $j++)
    {
        if (isset($tmpArray[$target][1][$j]))
        {
            $checker = $tmpArray[$target][1][$j];
        }

        $tmpLeftCount = $j + 1;

        if ($tmpLeftCount === 1)
        {
            $tmpLeftHalfLength = 1;
        }
        else
        {
            if ($tmpLeftCount % 2 === 1)
            {
                $tmpLeftHalfLength = ceil($tmpLeftCount / 2);
            }
            else
            {
                $tmpLeftHalfLength = $tmpLeftCount / 2 + 1;
            }
        }

        $tmpRightCount = $arrLength - $tmpLeftCount;

        if ($tmpRightCount === 1)
        {
            $tmpRightHalfLength = 1;
        }
        else
        {
            if ($tmpRightCount % 2 === 1)
            {
                $tmpRightHalfLength = ceil($tmpRightCount / 2);
            }
            else
            {
                $tmpRightHalfLength = $tmpRightCount / 2 + 1;
            }
        }

        if ($checker >= $tmpLeftHalfLength &&
            $tmpArray[$target][0] - $checker >= $tmpRightHalfLength)
        {
            $result++;
        }
    }

    return $result;
}