<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Models\User;

class ArticleController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        $userId = null;
     
        if(Auth::check() && Auth::user()->is_premium) {
            $builder = Article::query();
        } else {
            $builder = Article::where('is_premium', false);
        }

        // TODO: ik vind onderstaande code moeilijk te lezen / begrijpen, het zou verhelderend zijn om met commentaar
        // aan te geven hoe de filters werken
        $builder->when($request->filled('category') && $request->get('category') != "0", function ($query) use ($request) {
            $query->where('category_id', $request->input('category'));
        });
        $builder->when($request->filled('user'), function ($query) use ($request, &$userId) {
            if($request->get('user') != "0") {
                $userId = $request->input('user');
                $query->where('user_id', $userId);
            }         
        }, function ($query) use (&$userId) {
            if(Auth::check()) {
                $userId = Auth::user()->id;
                $query->where('user_id', $userId);
            }
        });

        $articles = $builder->with('category')->get();
        // TODO: onderstaande regel is overbodig, want $user wordt nergens gebruikt
        $user = Article::find(1)->user;
        
        $categories = Category::with('articles')->get();
        $users = User::with('articles')->get();

        return view('articles.index', compact('articles', 'categories', 'users', 'userId'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));

    }
     

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request) 
    // TODO: deze witregel kan weg, gebruik evt. een formatter plugin om je code op te laten maken
    {
        $validated = $request->validated();
        $path = $request->file('image')->store('images', ['disk' => 'public']);

        $article = new Article();
        $article->name = $validated["name"];
        $article->description = $validated["description"];
        $article->image_path = "storage/" . $path;
        $article->is_premium = $validated["is_premium"];
        
        if($validated["category_id"] !== null) {
            // er is een bestaande categorie gekozen
            $category = Category::find($validated["category_id"]);
        } else {
            // er is een nieuwe categorie ingevoerd
            $category = Category::create(["name" => $validated["new_category_name"]]);
        }

        Auth::check() ? $article->user()->associate(Auth::user()) : $article->user()->associate(User::firstWhere("name", "Default user"));

        $article->category()->associate($category);
        $article->save();  
    
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO: gebruik route-model binding
        $article = Article::find($id);
        $categories = Category::all();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, Article $article)
    {
        $validated = $request->validated();

        $path = $request->file('image')->store('images', ['disk' => 'public']);
        $validated["image_path"] = "storage/" . $path;
        $article->update($validated);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        

        return redirect()->route('articles.index');
    }
public function premium()
    {
        return view('articles.premium');
    }
}

