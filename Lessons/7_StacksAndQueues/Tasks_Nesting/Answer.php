<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($S) {
    // write your code in PHP7.0
    $strLength = strlen($S);

    if ($strLength < 0 || $strLength > 1000000) return 0;

    if ($strLength === 0) return 0;

    if ($strLength % 2 === 1) return 0;

    $leftCount = 0;
    $nestCount = 0;
    
    for ($i = 0; $i < $strLength; $i++)
    {
        if ($S[$i] === '(')
        {
            $leftCount++;
            continue;
        }
        else if ($S[$i] === ')')
        {
            if ($leftCount > 0)
            {
                $leftCount--;
                $nestCount++;
                continue;
            }

            return 0;
        }

        return 0;
    }

    if ($leftCount === 0) return 1;

    return 0;
}