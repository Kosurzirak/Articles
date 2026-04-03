<nav>
    <ul>
       <li><a href="{{ route('articles.index') }}">Article List</a></li>
       <li><a href="{{ route('articles.create') }}">Create Article</a></li>
       <li><a href="{{ route('login.show') }}">Login</a></li>
       @auth
       <li><a href="{{ route('article.premium') }}">Become a Premium</a></li>
       @endauth
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav>