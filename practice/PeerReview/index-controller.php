<?php
session_start();
if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    $winner = $results['winner'];
    $status = $results['status'];

    $showResults = true;

    unset($_SESSION['results']);

} else {
    $showResults = false;
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $showError = true;
    unset($_SESSION['error']);
} else {
    $showError = false;
}
