<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($H) {
    // write your code in PHP7.0
    $arrLength = sizeof($H);

    if ($arrLength < 1 || $arrLength > 100000) return 0;

    $tmpArray = [];
    $stoneArray = [];

    $lastP = 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($H[$i] < 1 || $H[$i] > 1000000000) return 0;

        while(true)
        {
            if ($i === 0 || $H[$i] > $tmpArray[$lastP][1])
            {
                array_push($tmpArray, [$i, $H[$i]]);
                
                if ($i !== 0)
                {
                    $lastP++;
                }

                break;
            }

            if ($H[$i] <= $tmpArray[$lastP][1])
            {
                $tmp = array_pop($tmpArray);
                $lastP--;
                array_push($stoneArray, $tmp);
            }

            if ($H[$i] === $tmpArray[$lastP][1])
            {
                break;
            }
        }
    }

    var_dump($stoneArray);
    return sizeof($stoneArray);
}