@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Document</title>
</head>
<body>
    <h3>Login and Register!!</h3>

    @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
         <input type="text" name="email" placeholder="Email">
         <input type="password" name="password" placeholder="Password">
         <button>Login</button>
    </form>

    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

    <h3>Signup</h3>
        <form action="{{ route('register.post') }}" method="POST">
            @csrf 
            <input type="text" name="name" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="text" name="email" placeholder="E_Mail">
            <input type="checkbox" name="is_premium" value="1">
            <label for="is_premium">Subscribe</label><br>
            <input type="submit">Signup</button>
    </form>
</body>
</html>