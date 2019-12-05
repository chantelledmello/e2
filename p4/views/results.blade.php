@extends('templates.master')

@section('title')
All Results
@endsection

@section('content')
<div id="game-result">
<h1 class="result-title"> Game Results </h1>
@foreach ($results as $result)
<a href = "/result?id={{$result['id']}}">
<p class="result-text">  Game Result No. {{$result['id']}} </p>
</a>
@endforeach
<a href='/'>&larr; Return Home</a>
</div>

@endsection
