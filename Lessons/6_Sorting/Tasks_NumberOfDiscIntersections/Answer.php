<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    // if ($arrLength < 0 || $arrLength > 100000) return 0;
    // if ($arrLength === 0 || $arrLength === 1) return 0;
    if ($arrLength <= 1 || $arrLength > 100000) return 0;

    $circles = [];
    $points = [];

    $intersect = 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < 0 || $A[$i] > 2147483647) return 0;

        if ($A[$i] === 0)
        {
            $points[] = $i;
            continue;
        }

        $circles[] = [$i, $i - $A[$i], $i + $A[$i]];
    }

    $circlesLength = sizeof($circles);
    $pointsLength = sizeof($points);
    
    // circles to circles
    if ($circlesLength > 1)
    {
        $jLimit = $circlesLength - 1;

        for ($j = 0; $j < $jLimit; $j++)
        {
            for ($k = $j + 1; $k < $circlesLength; $k++)
            {
                if ($circles[$j][1] > $circles[$k][2] ||
                    $circles[$j][2] < $circles[$k][1])
                {
                    continue;
                }

                $intersect++;
            }
        }
    }

    // circles to points
    if ($circlesLength > 0 && $pointsLength > 0)
    {
        for ($j = 0; $j < $circlesLength; $j++)
        {
            for ($k = 0; $k < $pointsLength; $k++)
            {
                if ($circles[$j][1] > $points[$k] ||
                    $circles[$j][2] < $points[$k])
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