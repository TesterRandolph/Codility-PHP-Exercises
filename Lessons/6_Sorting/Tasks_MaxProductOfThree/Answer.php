<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    $tmpArray = [];
    $tmpLength = 0;

    if ($arrLength < 3 || $arrLength > 100000) return 0;
    
    if ($arrLength === 3) return $A[0] * $A[1] * $A[1];

    $countNotZero = 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000 || $A[$i] > 1000) return 0;

        if ($A[$i] === 0)
        {
            continue;
        }
        else if ($A[$i] < 0)
            $tmp = 0 - $A[$i];
        }
        else
        {
            $tmp = $A[$i];
        }

        $countNotZero++;

        $tmp = [$i, $tmp, $A[$i]];

        for ($j = 0; $j < $tmpLength; $j++)
        {
            if (isset($tmpArray[$j]) && $tmp[1] > $tmpArray[$j][1])
            {
                $swicthTmp = $tmpArray[$j];
                $tmpArray[$j] = $tmp;
                $tmp = $swicthTmp;
            }
        }

        if ($tmpLength < 5)
        {
            $tmpArray[$tmpLength] = $tmp;
            $tmpLength++;
        }
    }

    if ($tmpLength < 3) return 0;

    if ($tmpLength === 3)
    {
        return $tmpArray[0][2] * $tmpArray[1][2] * $tmpArray[2][2];
    }

    var_dump($tmpArray);
}