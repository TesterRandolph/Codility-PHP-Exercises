<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($X, $Y, $D) {
    // write your code in PHP7.0
    $min = 1;
    $max = 1000000000;

    if ($X < $min || $X > $max) return 0;

    if ($Y < $min || $Y > $max) return 0;

    if ($D < $min || $D > $max) return 0;

    if ($X > $Y) return 0;

    $tmp = ($Y - $X) % $D;

    $result = ($Y - $X - $tmp) / $D;

    if ($tmp > 0) $result += 1;

    return $result;
}
