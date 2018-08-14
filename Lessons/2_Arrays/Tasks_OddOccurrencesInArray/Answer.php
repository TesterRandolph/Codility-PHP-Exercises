<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    $tmpArray = [];
    $arrLength = sizeof($A);
    
    if ($arrLength < 1 || $arrLength > 1000000 || ($arrLength % 2) !== 1) return 0;
    
    for ($i = 0; $i < $arrLength; $i++) {
        if ($A[$i] < 1 || $A[$i] > 1000000000) return 0;
        
        $tmpArray[$A[$i]][] = $i;
    }
    
    foreach ($tmpArray as $value => $indexArr) {
        if (sizeof($indexArr) % 2 !== 0) return $value;
    }
}