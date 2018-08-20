<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($S, $P, $Q) {
    // write your code in PHP7.0
    $zero = 0;
    $one = 1;
    $maxN = 100000;
    $maxM = 50000;

    $strLength = strlen($S);

    if ($strLength < $one || $strLength > $maxN) return [];

    if (sizeof($P) !== sizeof($Q)) return [];

    $arrLength = sizeof($P);

    if ($arrLength < $one || $arrLength > $maxM) return [];

    $S = preg_replace(['/A/', '/C/', '/G/', '/T/'], ['1','2','3','4'], $S);

    $result = [];

    for ($j = 0; $j < $arrLength; $j++)
    {
        if ($P[$j] < $zero || $P[$j] >= $maxN) return [];

        if ($Q[$j] < $zero || $Q[$j] >= $maxN) return [];

        if ($P[$j] > $Q[$j]) return [];

        if ($P[$j] === $Q[$j])
        {
            $result[$j] = intval($S[$P[$j]]);
            continue;
        }

        $tmpLength = $Q[$j] - $P[$j] + 1;

        $tmp = substr($S, $P[$j], $tmpLength);
        
        if (preg_match('/(1)/', $tmp, $matches))
        {
            $result[$j] = 1;
            continue;
        }

        if (preg_match('/(2)/', $tmp, $matches))
        {
            $result[$j] = 2;
            continue;
        }

        if (preg_match('/(3)/', $tmp, $matches))
        {
            $result[$j] = 3;
            continue;
        }

        if (preg_match('/(4)/', $tmp, $matches))
        {
            $result[$j] = 4;
            continue;
        }
    }
    
    return $result;
}