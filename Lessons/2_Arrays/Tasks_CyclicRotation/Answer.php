<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A, $K) {
    // write your code in PHP7.0
    if ( ! is_array($A)) return false;

    $ArrLength = count($A);

    if ($ArrLength < 0 || $ArrLength > 100) return false;

    if ($ArrLength === 0) return $A;

    if ($K < 0 || $K > 100) return false;

    if ($K === 0) return $A;

    foreach($A as $element) {
        if ( ! is_int($element) ||
                $element < -1000 ||
                $element > 1000) {
            return false;
        }
    }

    for ($i = 0; $i < $K; $i++) {
        $temp = 0;

        for ($j = $ArrLength - 1; $j >= 0 ; $j--) {
            if ($j === 0) {
                $A[$j] = $temp;
            } else {
                if ($j === $ArrLength - 1) {
                    $temp = $A[$j];
                }
                
                $A[$j] = $A[$j - 1];
            }
        }
    }

    return $A;
}
