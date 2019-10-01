<?php

// Array with all possible throws
$throws = ['rock', 'paper', 'scissors',];

// Assign Player A a random throw
$playerA = $throws[rand(0,2)];
$playerB = $throws[rand(0,2)];

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

?>
