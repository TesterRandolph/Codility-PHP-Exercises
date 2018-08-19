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
    
    $maxOperation = [0, 0];

    if ($N < $min || $N > $max) return [];

    if ($arrLength < $min || $arrLength > $max) return [];

    for ($i = 0; $i < $arrLength; $i++)
    {
        
        if ($A[$i] >= $min && $A[$i] <= $N)
        {
            $index = $A[$i]-1;

            if (!isset($tmpArray[$index])) $tmpArray[$index] = 0;

            if ($maxOperation[0] === 1 && $tmpArray[$index] < $maxOperation[1])
            {
                $tmpArray[$index] = $maxOperation[1];
            }

            $tmpArray[$index]++;

            if ($tmpArray[$index] > $maxElement) $maxElement = $tmpArray[$index];
        }
        else if ($A[$i] === ($N + 1))
        {
            $maxOperation = [1, $maxElement];
        }
        else
        {
            return [];
        }
    }

    for ($j = 0; $j < $N; $j++)
    {
        if (!isset($tmpArray[$j])) $tmpArray[$j] = 0;

        if ($maxOperation[0] === 1 && $tmpArray[$j] < $maxOperation[1])
        {
            $tmpArray[$j] = $maxOperation[1];
        }

    }

    return $tmpArray;
}