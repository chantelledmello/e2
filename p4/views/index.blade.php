@extends('templates.master')

@section('title')
    Rock, Paper, Scissors
@endsection

@section('content')

    <!-- Section 1 - Introduction -->

      <div>
        <img src="images/rockpaperscissors.png" alt="profile picture">
      </div>
      <h1> {{$app->config('app.name')}} </h1>

      <!-- Display errors. If none, display confirmation message -->
      @if($app->errorsExist())
      <div class="alert alert-fail" role="alert">
        @foreach($app->errors() as $error)
        <p>{{ $error }}</p>
        @endforeach
      </div>
      @endif

      <h3> Game Mechanics </h3>
      <p> Let's play rock, paper, scissors against the computer.
        Pick your move and the computer will do the same.
        A tie is declared if both you and the computer throw the same move.
        Otherwise: rock beats scissors, scissors beats paper, paper beats rock. At the end of
        three rounds, an overall winner is declared. If two games tie,
        the winner is the winner of the remaining round. Bonne chance!</p>
      <h3> Pick One </h3>
      <p> Pick your throws for each round of the game using the radio buttons below. You can only pick one option per
        round.</p>
      <form method='GET' action='/save-results'>
        <div>
          <input type="radio" name="result" value="rock" id="rock"> <label for="rock"> rock </label>
          <input type="radio" name="result" value="paper" id="paper"> <label for="paper"> paper </label>
          <input type="radio" name="result" value="scissors" id="scissors"> <label for="scissors"> scissors </label>
        </div>
        <button type='submit'> Let's Play </button>
        </form>

        <!-- Display results from session variables after form is processed -->

        @if ($result)
        <hr>

        <h3> Results </h3>

          @if ($result['winner'] == 1)
          <div class="alert alert-success" role="alert">
          @elseif ($result['winner'] == 2)
          <div class="alert alert-fail" role="alert">
          @else
          <div class="alert alert-neutral" role="alert">
          @endif

        <p> The user picked {{$result['user_pick']}}. The computer picked {{$result['computer_pick']}}.
        @if ($result['winner'] == 1)
          The player won!
          @elseif ($result['winner'] == 2)
          Uh oh! The computer won
          @else
          The game was a tie
        @endif </p>
        </div>

        <a href='/results'><button type='button'> View More Results   &rarr; </button> </a>
        @endif

@endsection
