<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A, $B) {
    // write your code in PHP7.0
    $arrLengthA = sizeof($A);
    $arrLengthB = sizeof($B);

    if ($arrLengthA < 1 || $arrLengthA > 100000) return 0;

    if ($arrLengthB < 1 || $arrLengthB > 100000) return 0;

    if ($arrLengthA !== $arrLengthB) return 0;

    $tmpArray = [];
    $tmpLength = 0;

    for ($i = 0; $i < $arrLengthB; $i++)
    {
        if ($A[$i] < 0 || $A[$i] > 1000000000) return 0;

        if ($B[$i] !== 0 && $B[$i] !== 1) return 0;

        while(true)
        {
            if ($tmpLength === 0)
            {
                array_push($tmpArray, [$A[$i], $B[$i]]);
                $tmpLength++;
                break;
            }

            $last = $tmpLength - 1;

            if ($tmpArray[$last][1] === 0 || $tmpArray[$last][1] === $B[$i])
            {
                array_push($tmpArray, [$A[$i], $B[$i]]);
                $tmpLength++;
                break;
            }

            if ($B[$i] === 0)
            {
                if ($tmpArray[$last][0] === $A[$i])
                {
                    return 0;
                }

                if ($tmpArray[$last][0] > $A[$i])
                {
                    break;
                }

                array_pop($tmpArray);
                $tmpLength--;
            }
        }
    }

    return $tmpLength;
}