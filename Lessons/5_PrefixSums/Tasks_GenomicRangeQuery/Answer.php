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

    for ($i = 0; $i < $strLength; $i++)
    {
        switch ($S[$i])
        {
            case 'A':
                $S[$i] = 1;
                break;

            case 'C':
                $S[$i] = 2;
                break;

            case 'G':
                $S[$i] = 3;
                break;

            case 'T':
                $S[$i] = 4;
                break;

            default:
                return [];
        }
    }

    $result = [];

    for ($j = 0; $j < $arrLength; $j++)
    {
        if ($P[$j] < $zero || $P[$j] >= $maxN) return [];

        if ($Q[$j] < $zero || $Q[$j] >= $maxN) return [];

        if ($P[$j] > $Q[$j]) return [];

        $tmpLength = $Q[$j] - $P[$j] + 1;

        $tmp = substr($S, $P[$j], $tmpLength);

        for ($t = 1; $t <= 4; $t++)
        {
            if (preg_match('/(' . $t . ')/', $tmp, $matches))
            {
                $result[$j] = $t;
                break;
            }
        }
    }
    
    return $result;
}