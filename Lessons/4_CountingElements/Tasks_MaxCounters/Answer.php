<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    $tmpArray = [];

    $min = 1;
    $max = 100000;

    $maxElement = 0;

    if ($N < $min || $N > $max) return [];

    if ($arrLength < $min || $arrLength > $max) return [];

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] >= $min && $A[$i] <= $N)
        {
            $index = $A[$i]-1;

            if (!isset($tmpArray[$index])) $tmpArray[$index] = 0;

            $tmpArray[$index]++;
            $maxElement = $tmpArray[$index];
        }
        else if ($A[$i] === ($N + 1))
        {
            for ($j = 0; $j < $N; $j++)
            {
                $tmpArray[$j] = $maxElement;
            }
        }
        else
        {
            return [];
        }
    }

    return $tmpArray;
}