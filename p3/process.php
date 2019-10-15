<?php

session_start();

$arrayPlayerA = [];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
//Grab values from the form
    if (empty($_GET['round1']) || empty($_GET['round2']) || empty($_GET['round3'])) {
        $errorMessage = "Please pick one throw per round";
    } else {
        $arrayPlayerA = [$_GET['round1'], $_GET['round2'], $_GET['round3']];
    }
}

// Array with all possible throws
$throws = ['rock', 'paper', 'scissors'];

// Run the whole simulation 3 times and record each player choice and round winner in an array "rounds"
$rounds = [];

/* Create two variables to store the number of times the program finds the strings 'Player A' and 'Player B' in the
 * values mapped to the winner key */
$countA = 0;
$countB = 0;

for ($i = 0; $i < count($arrayPlayerA); $i++) {
    // foreach ($choices as $choice)

// Assign Player B a random throw
    $playerA = $arrayPlayerA[$i];
    $playerB = $throws[array_rand($throws)];

// Compare and find the winner of each round
    $winner = null;
    if ($playerA == $playerB) {
        $winner = false;
    } else if ($playerA == "rock" && $playerB == "scissors" ||
        $playerA == "paper" && $playerB == "rock" ||
        $playerA == "scissors" && $playerB == "paper") {
        $winner = 'You';
    } else {
        $winner = 'The Computer';
    }

    //store player picks and round winners in an array
    $rounds[] = array("A" => $playerA, "B" => $playerB, "winner" => $winner);

    // Count and compare round winners to find the overall Winner
    // Iterate through the array and find the strings + store their count in the initialised variables
    $countA += substr_count($rounds[$i]["winner"], 'You');
    $countB += substr_count($rounds[$i]["winner"], 'The Computer');

    // Subtract the two variables to create the basis for a control structure (an if construct)
    $sum = $countA - $countB;
    $overallWinner = null;

    if ($sum < 0) {
        $overallWinner = "Uh oh, the Computer wins!";
    } else if ($sum > 0) {
        $overallWinner = "You are the winner!";
    } else {
        $overallWinner = "The game is a tie";
    }

}

// Store variables in a Session to be used by index.php
$_SESSION['overallWinner'] = $overallWinner;
$_SESSION['rounds'] = $rounds;
$_SESSION['errorMessage'] = $errorMessage;

//Redirect back to index.php to display results once processed
header('Location: index.php#results');
