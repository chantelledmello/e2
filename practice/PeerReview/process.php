<?php
session_start();

(empty($_GET['guess'])) ? $error = "Please enter a value" : $guess = $_GET['guess'];

if ($guess) {
    $compAnswer = rand(1, 50);
    if ($guess == $compAnswer) {
        $winner = true;
    } else {
        ($guess < $compAnswer) ? $status = 1 : $status = 2;
    }

    $results = ['winner' => $winner, 'status' => $status, 'guess' => $guess];
}

$_SESSION['results'] = $results;
$_SESSION['error'] = $error;

header('Location: index.php');
