<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $min = 1;
    $max = 100000;

    $tmpArray = [];

    $arrLength = sizeof($A);
    
    if ($X < $min || $X > $max) return -1;

    if ($arrLength < $min || $arrLength > $max) return -1;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < $min || $A[$i] > $X) return -1;

        $tmpArray[$A[$i]][] = $i;
    }

    $result = -1;

    for ($i = $min; $i <= $X; )
    {
        if (!isset($tmpArray[$i])) return -1;

        while (sizeof($tmpArray[$i]) > 0)
        {
            $tmp = array_shift($tmpArray[$i]);

            if ($tmp > $result)
            {
                $result = $tmp;
                break;
            }

            if ($tmp < $result) break;
        }

        $i++;
    }

    return $result;
}