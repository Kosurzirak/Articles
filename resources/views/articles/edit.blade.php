@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <p>This is the content for the page.</p>
@endsection
<link rel="stylesheet" href="/css/edit.css">
<h1>Article Bewerken</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" value="{{ $article->name }}" required>
    
    <br>
    <label for="description">Beschrijving:</label>
    <textarea id="description" name="description">{{ $article->description }}</textarea>
    <br>

    <button type="submit">Bijwerken</button>
    <label for="category">Categorie:</label>
<select name="category_id" id="category" required>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>
<label class="form-label" for="inputFile">File</label>
    <input
       type="file"
       name="image"
       id="inputFile"> 
       <select name="is_premium" class="selectPremium" id="$check_mark">
       <option value="0">No Premium content</option>
       <option value="1">Yess Premium content</option>
    </select>
    
</form>
<div class="burger">
  <div class="bun top">
    <div class="sesame-seed one"></div>
    <div class="sesame-seed two"></div>
    <div class="sesame-seed three"></div>
  </div>
  <div class="cosmic-fill">
  </div>
  <div class="bun bottom"></div>
</div>