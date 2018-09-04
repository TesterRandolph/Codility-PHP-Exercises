<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 3 || $arrLength > 100000) return 0;

    $max = 0;

    for ($s = 0; $s < $arrLength; $s++)
    {
        if ($A[$s] < -10000 || $A[$s] > 10000) return 0;

        if ($s === 0 || $s + 1 === $arrLength) continue;

        if ($s === 1) $max = $A[$s];

        if ($A[$s] > $max) $max = $A[$s];
    }

    $iLimit = $arrLength - 3;

    // $i = 0 always jump
    for ($i = 0; $i < $iLimit; $i++)
    {
        $startLeft = $i;
        $jLimit = $arrLength - 2 - ($startLeft);

        if ($i === 0)
        {
            $max = $A[$startLeft];
        }

        $leftSum = 0;

        // get $j elements from left
        for ($j = 0; $j < $jLimit; $j++)
        {
            $startRight = $startLeft + 1 + $j;
            $kLimit = $arrLength - 1 - $startRight;

            if ($j !== 0)
            {
                $leftSum += $A[$startLeft + $j];
            }

            $rightSum = 0;

            // get $k elements from right
            for ($k = 1; $k < $kLimit; $k++)
            {
                $rightSum += $A[$startRight + $k];

                if ($leftSum + $rightSum > $max)
                {
                    $max = $leftSum + $rightSum;
                }
            }
        }
    }

    return $max;
}