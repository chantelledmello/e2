<?php require 'index-controller.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic Page Info
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>DGMD E-2 Project 1</title>
  <meta name="description" content="Proof of concept for Git and Server setup">
  <meta name="author" content="Chantelle D'mello">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Styles
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel=stylesheet href="css/normalise.css">
  <link rel="stylesheet" href="css/styles.css">

  <!-- Web Fonts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque:300&display=swap" rel="stylesheet">
</head>

<body>


  <!-- Section 1 - Introduction -->

  <section>
    <div>
      <div>
        <img src="images/rockpaperscissors.png" alt="profile picture">
      </div>
      <h1> Rock, Paper, Scissors </h1>
      <h2> Best of Three </h2>
      <h2> Game Mechanics </h2>
      <p> Player A and Player B randomly “throw” either Rock, Paper or Scissors.
        A tie is declared if both players throw the same move.
        Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock. </p>
      <h2> Results </h2>
      <?php foreach ($rounds as $key => $round) {?>
      <ul>
        <li>Player A picked <?php echo $round["A"]; ?></li>
        <li>Player B picked <?php echo $round["B"]; ?></li>
        <li><?php echo $round["winner"]; ?></li>  </ul>
      <?php }?>

      <p> <?php echo $overallWinner; ?></p>


    </div>
  </section>

</body>

</html>