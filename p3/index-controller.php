<?php

session_start();

if (!empty($_SESSION['rounds'])) {
    $rounds = $_SESSION['rounds'];
    $overallWinner = $_SESSION['overallWinner'];

    $showResults = true;
    $showWinner = true;

    unset($_SESSION['rounds']);
    unset($_SESSION['overallWinner']);

} else {

    $showResults = false;
    $showWinner = false;
}

if (isset($_SESSION['errorMessage'])) {
    $errorMessage = $_SESSION['errorMessage'];
    $showError = true;
    unset($_SESSION['errorMessage']);
} else {
    $showError = false;
}
