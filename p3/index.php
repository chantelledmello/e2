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
      <h3> Game Mechanics </h3>
      <p> Player A and Player B randomly “throw” either Rock, Paper or Scissors.
        A tie is declared if both players throw the same move.
        Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock. At the end of
        three rounds, an overall winner is declared. If two games tie,
        the winner is the winner of the remaining round.</p>
      <h3> Pick One </h3>
      <p> Pick your throws for each round of the game using the radio buttons below. You can only pick one option per
        round.</p>
      <form method='GET' action='process.php'>
        <div>
          <h4> Round 1 </h4>
          <input type="radio" name="round1" value="rock" id="rock1"> <label for="rock1"> rock </label>
          <input type="radio" name="round1" value="paper" id="paper1"> <label for="paper1"> paper </label>
          <input type="radio" name="round1" value="scissors" id="scissors1"> <label for="scissors1"> scissors </label>
        </div>
        <div>
          <h4> Round 2 </h4>
          <input type="radio" name="round2" value="rock" id="rock2"> <label for="rock2"> rock </label>
          <input type="radio" name="round2" value="paper" id="paper2"> <label for="paper2"> paper </label>
          <input type="radio" name="round2" value="scissors" id="scissors2"> <label for="scissors2"> scissors </label>
        </div>
        <div>
          <h4> Round 3 </h4>
          <input type="radio" name="round3" value="rock" id="rock3"> <label for="rock3"> rock </label>
          <input type="radio" name="round3" value="paper" id="paper3"> <label for="paper3"> paper </label>
          <input type="radio" name="round3" value="scissors" id="scissors3"> <label for="scissors3"> scissors </label>
        </div>
        <?php if ($showError) {?>
          <p class="errorMessage"> <?php echo $errorMessage; ?> </p>
        <?php }?>


        <button type='submit'> Let's Play </button>
        </form>

        <!-- PHP view processing happens here: -->
        <?php if ($showResults) {?>

        <h3 class="results"> Results </h3>
    <?php foreach ($rounds as $key => $round) {?>
            <ul id="results">
              <li>Player A picked <?php echo $round["A"]; ?></li>
              <li>Player B picked <?php echo $round["B"]; ?></li>
            <?php if ($round["winner"] && $round["winner"] == "You") {?>
              <li class="win"> <?php echo $round["winner"] . " win"; ?></li>
            <?php } elseif ($round["winner"] && $round["winner"] !== "You") {?>
              <li class="lose"> <?php echo $round["winner"] . " wins"; ?></li>
              <?php } else {?>
              <li> It is a tie </li>
            <?php }?>
            </ul>
          <?php }}?>

<?php if ($showWinner) {?>
<p class="bigWin"> <?php echo $overallWinner; ?></p>
<?php }?>


    </div>
  </section>
</body>

</html>