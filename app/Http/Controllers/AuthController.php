<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function show()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|string|max:50',
            'password' => 'required|string',
        ]);
 // Attempt to log in using the provided credentials and the Auth facade (class)
        if (Auth::attempt($credentials)) {
// Regenerate the session to prevent session fixation
            $request->session()->regenerate();
   // Redirect to intended page or home
            return redirect()->intended('articles');
        }
        // Invalid credentials, output error message
        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ])->withInput();
    }
   // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    /**
     * register a user
     */
    public function postRegistration(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_premium' => 'boolean'
        ]);

        $data = $request->all();
        
        $user = User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'is_premium' => $request->boolean('is_premium')
        ]);

        Auth::login($user); 

        return redirect("articles")->withSuccess('Great! You have Successfully loggedin');
    }
  }


 
