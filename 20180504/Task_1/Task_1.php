<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($E, $L) {
    // write your code in PHP7.0
    $pattern = '/^([0-9]{2}):([0-9]{2})$/';

    preg_match($pattern, $E, $start);
    preg_match($pattern, $L, $end);

    $start[1] = intval($start[1]);
    $start[2] = intval($start[2]);

    $end[1] = intval($end[1]);
    $end[2] = intval($end[2]);

    if ($end[2] <= $start[2]) {
        $hour = $end[1] - $start[1];
    } else {
        $hour = $end[1] - $start[1] + 1;
    }

    if ($hour > 1) {
        return (2 + 3 + 4 * ($hour - 1));
    }

    return (2 + 3);
}