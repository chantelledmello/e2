<?php

// Array with all possible throws
$throws = ['rock', 'paper', 'scissors'];

// Run the whole simulation 3 times and record each player choice and
// round winner in an array

$rounds = [];

for ($i = 0; $i < 3; $i++) {

// Create an array to store Player throws

// Assign Player A a random throw
    $playerA = $throws[array_rand($throws)];
    $playerB = $throws[array_rand($throws)];

// Compare
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

// var_dump($rounds);

// Compare individual round winners and decide on an overall winner

$countA = 0;
$countB = 0;

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
// var_dump($overallWinner);
