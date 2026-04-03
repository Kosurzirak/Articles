<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comment = new Comment();
        
        $comment->post()->associate($_POST);

        $comment->save();

         return redirect()->back()->with('message', 'Comment added successfully!');
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentsRequest $request, Article $article)
    {   
        $validated = $request->validated();
        $validated["article_id"] = $article->id;
        // dd($validated);

        $comment = Comment::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
