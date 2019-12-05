@extends('templates.master')

@section('title')
Game No. {{ $result['id'] }}
@endsection

@section('content')
<div id="game-result">
<h2>Game No. {{ $result['id'] }}</h2>
<p> The player chose {{ $result['user_pick'] }}. The computer chose {{ $result['computer_pick'] }}.
@if ($result['winner'] == 1)
   The player won!
@elseif ($result['winner'] == 2)
 Uh oh! The computer won
@else
The game was a tie
@endif <br/>
<a href='/results'>&larr; Return to all game results</a>
</div>

@endsection
