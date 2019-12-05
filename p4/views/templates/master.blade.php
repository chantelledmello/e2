<!doctype html>
<html lang='en'>
<head>

<head>
  <!-- Basic Page Info
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <title>@yield('title', $app->config('app.name'))</title>
  <meta charset="utf-8">
  <meta name="description" content="P4 Rock Paper Scissors">
  <meta name="author" content="Chantelle D'mello">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Styles
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel=stylesheet href="css/normalise.css">
  <link rel="stylesheet" href="css/p4.css">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

  <!-- Web Fonts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque:300&display=swap" rel="stylesheet">

  @yield('head')
</head>
<body>

<header>
<!-- <a href='/'><img id='logo' src='/images/zipfoods-logo.png' alt='{{ $app->config('app.name') }} logo'></a> -->
</header>

<main>
  <div>
    @yield('content')
  </div>
</main>

<footer>
</footer>

@yield('body')

</body>
</html>
