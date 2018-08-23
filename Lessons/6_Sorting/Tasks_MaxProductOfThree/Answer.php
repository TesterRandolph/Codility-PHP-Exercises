<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $arrLength = sizeof($A);

    $mixTopArray = [];
    $mixTopArrLength = 0;

    $minLeftArray = [];
    $minLeftArrLength = 0;

    $maxLeftArray = [];
    $maxLeftArrLength = 0;

    $maxRightArray = [];
    $maxRightArrLength = 0;

    if ($arrLength < 3 || $arrLength > 100000) return 0;
    
    if ($arrLength === 3) return $A[0] * $A[1] * $A[2];

    $countLeft = 0;
    $countRight = 0;

    $tmp = 0;

    for ($i = 0; $i < $arrLength; $i++)
    {
        if ($A[$i] < -1000 || $A[$i] > 1000) return 0;

        $tmpArray = [$i, 0, $A[$i]];

        if ($A[$i] === 0)
        {
            continue;
        }
        else if ($A[$i] < 0)
        {
            $tmpArray[1] = 0 - $A[$i];
            $countLeft++;

            $targetArray = $tmpArray;

            for ($j = 0; $j < $minLeftArrLength; $j++)
            {
                if (isset($minLeftArray[$j]) && $targetArray[1] > $minLeftArray[$j][1])
                {
                    $swicthTmp = $minLeftArray[$j];
                    $minLeftArray[$j] = $targetArray;
                    $targetArray = $swicthTmp;
                }
            }

            if ($minLeftArrLength < 3)
            {
                $minLeftArray[$minLeftArrLength] = $targetArray;
                $minLeftArrLength++;
            }

            $targetArray = $tmpArray;

            for ($j = 0; $j < $maxLeftArrLength; $j++)
            {
                if (isset($maxLeftArray[$j]) && $targetArray[1] > $maxLeftArray[$j][1])
                {
                    $swicthTmp = $maxLeftArray[$j];
                    $maxLeftArray[$j] = $targetArray;
                    $targetArray = $swicthTmp;
                }
            }

            if ($maxLeftArrLength < 2)
            {
                $maxLeftArray[$maxLeftArrLength] = $targetArray;
                $maxLeftArrLength++;
            }
        }
        else
        {
            $tmpArray[1] = $A[$i];
            $countRight++;

            $targetArray = $tmpArray;

            for ($j = 0; $j < $maxRightArrLength; $j++)
            {
                if (isset($maxRightArray[$j]) && $targetArray[1] > $maxRightArray[$j][1])
                {
                    $swicthTmp = $maxRightArray[$j];
                    $maxRightArray[$j] = $targetArray;
                    $targetArray = $swicthTmp;
                }
            }

            if ($maxRightArrLength < 3)
            {
                $maxRightArray[$maxRightArrLength] = $targetArray;
                $maxRightArrLength++;
            }
        }

        for ($j = 0; $j < $mixTopArrLength; $j++)
        {
            if (isset($mixTopArray[$j]) && $tmpArray[1] > $mixTopArray[$j][1])
            {
                $swicthTmp = $mixTopArray[$j];
                $mixTopArray[$j] = $tmpArray;
                $tmpArray = $swicthTmp;
            }
        }

        if ($mixTopArrLength < 5)
        {
            $mixTopArray[$mixTopArrLength] = $tmpArray;
            $mixTopArrLength++;
        }
    }

    if ($mixTopArrLength < 3) return 0;

    if ($mixTopArrLength === 3)
    {
        return $mixTopArray[0][2] * $mixTopArray[1][2] * $mixTopArray[2][2];
    }

    if ($countRight === 0)
    {
        if ($countLeft !== $arrLength) return 0;

        return $minLeftArray[0][2] * $minLeftArray[1][2] * $minLeftArray[2][2];
    }

    if ($mixTopArray[0][2] > 0)
    {
        if ($mixTopArray[1][2] > 0)
        {
            return $mixTopArray[0][2] * $mixTopArray[1][2] * $maxRightArray[2][2];
        }
        else
        {
            return $mixTopArray[0][2] * $mixTopArray[1][2] * $maxLeftArray[2][2];
        }
    }
    else
    {
        if ($mixTopArray[1][2] > 0)
        {
            if (isset($maxLeftArray[1]))
            {
                return $mixTopArray[0][2] * $mixTopArray[1][2] * $maxLeftArray[1][2];
            }
            else
            {
                return $maxRightArray[0][2] * $maxRightArray[1][2] * $maxRightArray[2][2];
            }
        }
        else
        {
            return $mixTopArray[0][2] * $mixTopArray[1][2] * $maxRightArray[0][2];
        }
    }
}