<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($N) {
    // write your code in PHP7.0
    $BinaryStr = str_split(base_convert($N, 10, 2));

    $MaxLength = 0;
    $ZeroLength = 0;

    $StrLength = sizeof($BinaryStr);

    while ($StrLength > 0) {
        $PendingBit = intval(array_shift($BinaryStr));

        if ($PendingBit === 1) {
            if ($ZeroLength > 0 && $ZeroLength > $MaxLength) {
                $MaxLength = $ZeroLength;
            }

            $ZeroLength = 0;
        } else {
            $ZeroLength++;
        }

        $StrLength = sizeof($BinaryStr);
    }

    return $MaxLength;
}