<?php

// QUIZ QUESTION:
// The starting value for $x in the following code is 0.
// What is its ending value?

$x = 0;

foreach (str_split('five') as $key => $value) {
    for ($i = 0; $i < 3; $i++) {
        $x++;
    }
}

// EXPLANATION //

$x = 0;
$y = 0;

foreach (str_split('five') as $key => $value) {
    //Loop through the foreach loop as many times
    // as there are values of the array that the string
    // 'five' splits into, i.e. 4 times (keys of 0, 1, 2, and 3)

    $y++;
    var_dump($y);
    // this should output 1, 2, 3, and 4, every fourth value, and
    // represents how many times the external foreach loop runs

    for ($i = 0; $i < 3; $i++) {

        // on each loop of the foreach array, loop through an
        // internal array three times, incrementing x each time
        $x++;
        var_dump($x);

    }

    // therefore, x increments by 3 each internal loop, and then
    // the whole thing is repeated 4 times by the external foreach loop,
    // making the final value of x = 12
}

var_dump($y);
var_dump(str_split('five'));
