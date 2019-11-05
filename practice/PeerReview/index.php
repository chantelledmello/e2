<?php require 'index-controller.php';?>
<!doctype html>
<html lang='en'>

<head>

	<title>High-low Number Guessing Game</title>
	<meta charset='utf-8'>
    <style>
        .status { font-weight: bold; }
    </style>

</head>

<body>

    <h1>High-low Number Guessing Game</h1>

    <h2>Instructions</h2>

    <ul>
        <li>A random number between 1 and 50 will be generated and hidden.</li>
        <li>Try to guess the randomly-generated number.</li>
        <li>Hints will be given with each guess and will let you know if the number you guessed was too high or too low.</li>
        <li>Keep guessing until your number matches the randomly-generated number - in which case, you win!</li>
    </ul>

    <h2>Results</h2>

    <form method='GET' action='process.php'>
        <label for='guess'>Enter your guess: </label>
        <input type='number' name='guess' id='guess' min='1' max='50'>
        <button type='submit'>Submit</button>
    </form>

    <?php if ($showError) {?>
          <p class="error"> <?php echo $error; ?> </p>
        <?php }?>

    <?php if ($showResults) {?>
        <?php if ($winner) {?>
            <p class='status'>You won!</p>
            <p><a href='index.php'>Play again</a></p>
        <?php } else {?>
            <?php if ($status == 1) {?>
                <p class='status'>Your guess is too low.</p>
            <?php } else {?>
                <p class='status'>Your guess is too high.</p>
            <?php }?>
            <p>Try again.</p>
        <?php }?>
    <?php }?>

</body>

</html>