<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    if ($arrLength < 0 || $arrLength > 100000) return -1;

    $tmpArray = [];
    $halfLength = $arrLength / 2;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -2147483648 || $A[$i] > 2147483647) return -1;

        if (!isset($tmpArray[$A[$i]]))
        {
            $tmpArray[$A[$i]] = [1, $i];
            continue;
        }

        $tmpArray[$A[$i]][0]++;
        $tmpArray[$A[$i]][1] = $i;

        if ($tmpArray[$A[$i]][0] > $halfLength) return $i;
    }

    $maxCount = 0;
    $index = 0;

    foreach ($tmpArray as $vlaue => $infos)
    {
        if ($infos[0] > $maxCount)
        {
            $maxCount = $infos[0];
            $index = $infos[1];
        }
    }

    return $index;
}