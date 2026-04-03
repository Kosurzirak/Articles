@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/premium">
</head>
<body>
<h1>Become a premium NOW for just 500&euro; a year</h1>

<!-- TODO: voeg route helper functie toe die naar user controller post / update -->
<form action="{{ route('users.togglepremium') }}" method="POST">
    @CSRF
 
  <div>
    <span>Become a Premium User</span>
   
  </div>
<input type="submit" value="Signup and sell ur soul" class="" for="togglepremium" />
</form>









</body>