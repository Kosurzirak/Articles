@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

{{ $article }}
<body>
   
<h1>Show Page voor {{ $article->name }}</h1>
 

<h1>{{ $article->description }}</h1>
<div class="container">
    @if($article->image_path !== '')

    <div class="gallery">
        <img src="/{{ $article->image_path }}" alt="Uploaded Image">
    </div>
    @else
        <p>No images uploaded yet.</p>
    @endif
    <td>
        @foreach($article->comments as $comment)
            {{ $comment->comment }}
        @endforeach
    </td>
       <label for="comment">comment</label>

       <form action="{{ route('comments.store', ['article' => $article->id]) }}" method="post">
            @csrf
            <textarea name="comment" id="description"></textarea>
            <button type="submit">verzenden</button>
       </form>
    
    <button type="submit">Opslaan</button>
</div>
</body>  


