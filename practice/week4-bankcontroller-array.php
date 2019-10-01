<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Week 4 - PHPiggy Bank - Arrays</title>
    <meta charset='utf-8'>

</head>

<body>

<?php

# Define coin values in an array

$coinValue = [
    'pennies' => 0.01,
    'nickels' => 0.05,
    'dimes' => .10,
    'quarters' => 0.25
];
?>
<div> <?php
foreach ($coinValue as $coin => $value) {
    echo('You have ' . $value . ' ' . $coin . '<br/>');
};
?> </div> <hr> <?php

# Define coin counts in an array

$coinCounts = [
    'pennies' => 300,
    'nickels' => 5,
    'dimes' => 0,
    'quarters' => 125,
];
?>
<div> <?php
foreach ($coinCounts as $coin => $count) {
    echo('You have ' . $count . ' ' . $coin . '<br/>');
};
?></div> <hr> <?php


# Multiple arrays to add up how much money is in the piggy bank

$total = 0;
foreach ($coinCounts as $coin => $count) {
    $total += ($count * $coinValue[$coin]);
    //OR $total = $total + ($count * $coinValue[$coin]);
};
echo ('Your total is $' . $total); ?> <hr> <?php

# OR you can create a multi-dimensional array

$coins = [
    'pennies' => [.01, 300],
    'nickels' => [0.05, 5],
    'dimes' => [.10, 0],
    'quarters' => [0.25, 225],
];

$newTotal = 0;
foreach ($coins as $coin => $info) {
    $newTotal += ($info[0] * $info[1]);
};
echo ('Your new total is $' . $newTotal);

?>


</body>
</html>