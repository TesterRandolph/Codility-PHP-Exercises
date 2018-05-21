<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $length = count($A);

    $result = [];

    for ($i = 0; $i < $length - 1; $i++) {
        $sum = $A[$i];

        if ($sum === 0) {
            array_push($result, [$i, $i]);
        }

        for ($j = $i + 1; $j < $length; $j++) {
            $sum += $A[$j];

            if ($sum === 0) {
                array_push($result, [$i, $j]);
            }
        }
    }

    if (count($result) > 1000000000) return -1;

    return count($result);
}