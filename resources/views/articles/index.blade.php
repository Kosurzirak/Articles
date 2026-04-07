@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <p>Dit is de pagina waar alle artiklels plaats vinden</p>

    <!-- TODO: onderstaande links en welkomstboodschap zou ik in de nav blade doen -->

    @auth
     <h1>Welcome {{ Auth::user()->name }}</h1>   
    @endauth

    @guest
    <h1>    Welcome guest Please Login </h1>
        <li><a href="{{ route('login.show') }}">Login</a></li> 
        <li><a href="{{ route('login.show') }}">Register</a></li>
    @endguest
    
    <h1>Articles</h1>

    <form action="{{ route('articles.index') }}" method="GET">
        <div class="form-group">
            <label for="category-filter">Filter by category:</label>   
            
            <select class="form-control" name="category" id="category-filter">
                <option value="0">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        <button class="Filter" type="submit">Filter</button>
                    @endforeach  
            </select>
            <button type="submit">Filter</button>
            <label for="user-filter">Filter by users:</label> 
            <select class="form-control" name="user" id="user-filter">
                <option value="0">All Users</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}" {{$userId == $user->id ? 'selected' : '' }}>
                        {{$user->name}}
                </option>
                <button class="Filter" type="submit">Filter</button>
                @endforeach
            </select>
        </div>
    </form>

    @if (Auth::check())
        <div  class="usercreate">
            <a href="articles/create">
                Create Article
            </a>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Beschrijving</th>
                <th>Date</th>
                <th>User</th>
                <th></th>
                <th>Categories</th>
                <th>Acties</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td><a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a></td>
                <td>{{ $article->description }}</td>
                <td>Created on {{ date('jS M Y', strtotime($article->updated_at)) }}</td>
                <td>{{ $article->user->name }}</td>
                <td> 
                    <div class="container">
                        <h1>Uploaded Image</h1>
                        @if($article->image_path !== '')
                            <div class="gallery">
                                    <img src="/{{ $article->image_path }}" alt="Uploaded Image" width="200px">
                            </div>
                        @else
                        
                            <p>No images uploaded yet.</p>
                        @endif
                    </div>
                </td>
                <td>{{ $article->category->name }}</td>
                <td><a href="{{ route('articles.edit', $article->id) }}">Bewerken</a></td>
                <td>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijderen</button>
                    </form>
                </td>                
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
