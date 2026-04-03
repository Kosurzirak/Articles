@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<link rel="stylesheet" href="/css/create.css">
    <p>This is the content for the page.</p>
@endsection
 <h1>Nieuw Article Aanmaken</h1>
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Title" required>
    <br>
    <label for="description" >Beschrijving:</label>
    <textarea id="description" name="description" placeholder="Beschrijving"></textarea>
   
    
    <label class="form-label" for="inputFile">File</label>
    <input
       type="file"
       name="image"
       id="inputFile">
    
    <br>
    <button type="submit">Opslaan</button>
    <label for="category">Categorie:</label>

</select>
    <label>New category</label>
    <input type="text" id="$category" name="new_category_name" >
    <select  name="category_id" id="category">
        <option value="">No category selection</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
    </select>
    <select name="is_premium" class="selectPremium" id="$check_mark">
       <option value="0">No Premium content</option>
       <option value="1">Yess Premium content</option>
    </select>
<div class="container">
       @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</form>
