<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($S) {
    // write your code in PHP7.0
    $input = explode(' ', $S);

    $length = count($input);

    if (is_array($input) === false || $length === 0) {
        return -1;
    }

    $stack = [];

    for ($i = 0; $i < $length; $i++) {
        switch ($input[$i]) {
            case 'POP':
                array_pop($stack);
                break;
            case 'DUP':
                $target = array_pop($stack);
                array_push($stack, $target, $target);
                break;
            case '+':
                if (count($stack) < 2) return -1;
                
                $target = array_pop($stack);
                $target += array_pop($stack);
                array_push($stack, $target);
                break;
            case '-':
                if (count($stack) < 2) return -1;

                $target = array_pop($stack);
                $target -= array_pop($stack);
                array_push($stack, $target);
                break;
            default :
                if ( ! intval($input[$i])) return -1;

                array_push($stack, intval($input[$i]));
        }
    }

    return array_pop($stack);
}