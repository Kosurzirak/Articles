<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    
 {
        // ga deze functie implementeren
       $user = User::findOrFail($id);
        $user->update([
            'totalPaid' => $request->input('total_paid')
        ]);
        return redirect()
                ->route('articles.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function togglepremium() {
        // todo: logica toevoegen die de premium setting voor de ingelogde user toggled
        Auth::user()->update(['is_premium' => !Auth::user()->is_premium]);
         return redirect()->route('articles.index')->with('success', 'User status updated!');
    }
}