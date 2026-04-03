@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<p>Dit is de pagina waar je comments kunt plaatsen</p>
    <h1> Hello</h1>
    <h1>Nieuw Comment Aanmaken</h1>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
     <label for="comment">Comment</label>
      <input type="text" id="comment" name="comment" required>

