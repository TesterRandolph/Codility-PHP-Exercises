<?php
function solution(&$A, $K) {
    $n = sizeof($A);
    $best = 0;
    $count = 1;
    for ($i = 0; $i < $n - $K - 1; $i++) {
        if ($A[$i] == $A[$i + 1])
            $count = $count + 1;
        else
            $count = 0;
        $best = max($best, $count);
    }
    $result = $best + 1 + $K;

    return $result;
}