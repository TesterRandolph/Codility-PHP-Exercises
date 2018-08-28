<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($S) {
    // write your code in PHP7.0
    if (empty($S)) return 1;

    $strLength = strlen($S);

    if ($strLength < 0 || $strLength > 200000) return 0;

    if ($strLength % 2 === 1) return 0;

    $tmpArray = [];

    for ($i = 0; $i < $strLength; $i++)
    {
        if ($S[$i] === '(')
        {
            array_push($tmpArray, $S[$i]);
            continue;
        }
        else if ($S[$i] === ')')
        {
            $tmp = array_pop($tmpArray);

            if (empty($tmp) || $tmp !== '(')
            {
                return 0;
            }

            continue;
        }

        if ($S[$i] === '{')
        {
            array_push($tmpArray, $S[$i]);
            continue;
        }
        else if ($S[$i] === '}')
        {
            $tmp = array_pop($tmpArray);

            if (empty($tmp) || $tmp !== '{')
            {
                return 0;
            }

            continue;
        }

        if ($S[$i] === '[')
        {
            array_push($tmpArray, $S[$i]);
            continue;
        }
        else if ($S[$i] === ']')
        {
            $tmp = array_pop($tmpArray);

            if (empty($tmp) || $tmp !== '[')
            {
                return 0;
            }

            continue;
        }

        return 0;
    }

    if (sizeof($tmpArray) !== 0) return 0;

    return 1;
}