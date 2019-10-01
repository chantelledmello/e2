<?php

// Array with all possible throws
$throws = ['rock', 'paper', 'scissors'];

// Run the whole simulation 3 times and record each player choice and
// round winner in an array

$rounds = [];

for ($i = 0; $i < 3; $i++) {

// Assign Player A a random throw
    $playerA = $throws[array_rand($throws)];
    $playerB = $throws[array_rand($throws)];

// Compare and find the winner of this round
    $winner = null;

    if ($playerA == $playerB) {
        $winner = 'It is a tie';
    } else if ($playerA == "rock" && $playerB == "scissors" ||
        $playerA == "paper" && $playerB == "rock" ||
        $playerA == "scissors" && $playerB == "paper") {
        $winner = 'The winner is Player A';
    } else {
        $winner = 'The winner is Player B';
    }
    $rounds[] = array("A" => $playerA, "B" => $playerB, "winner" => $winner);
}

// Compare individual round winners and decide on an overall winner

/* Create two variables to store the number of times the
 *  program finds the strings 'Player A' and 'Player B' in the
 *  values mapped to the winner key
 */

$countA = 0;
$countB = 0;

// Iterate through the array and find the strings + store their
// count in the initialised variables

foreach ($rounds as $key => $round) {

    $overallWinner = null;

    $countA += substr_count($round["winner"], 'Player A');
    $countB += substr_count($round["winner"], 'Player B');

    if (($countA >= 2) ||
        (($countA == 1) && ($countB == 0))) {
        $overallWinner = "The overall winner is Player A";
    } else if ((($countA == 1) && ($countB == 1)) ||
        (($countA == 0) && ($countB == 0))) {
        $overallWinner = "The game is a tie";
    } else {
        $overallWinner = "The overall winner is Player B";
    }
}
