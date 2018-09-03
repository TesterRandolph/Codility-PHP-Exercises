<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 0 || $arrLength > 400000) return 0;

    if ($arrLength < 1) return 0;

    if ($arrLength === 2) return $A[1] - $A[0];

    $tmpArray = [];
    $tmpLength = 0;

    $iLimit = $arrLength - 1;

    $negativeCount = 0;

    for ($i = 0; $i < $iLimit; $i++)
    {
        $next = $i + 1;
        $profit = $A[$next] - $A[$i];
        $tmpArray[$tmpLength] = [$i, $next, $profit];
        $tmpLength++;

        if ($profit < 0)
        {
            $negativeCount++;
        }
    }

    if ($negativeCount === $iLimit) return 0;

    $max = 0;

    for ($j = 0; $j < $tmpLength; $j++)
    {
        if ($tmpArray[$j][2] <= 0) continue;

        $tmpProfit = 0;

        for ($k = $j; $k < $tmpLength; $k++)
        {
            if ($tmpArray[$k][2] > 0 && $tmpProfit < 0) break;

            $tmpProfit += $tmpArray[$k][2];

            if ($tmpProfit > $max) $max = $tmpProfit;
        }

        if ($negativeCount === 0) break;
    }

    return $max;
}