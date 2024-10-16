<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client_detailes;

class PostController extends Controller
{
    // Display the registration form
    public function ClientRegister()
    {
        return view('User.Registration');
    }

    // Handle the registration form submission
    public function register(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:client_detailes',  // Change to 'client_detailes'
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/photo'), $imageName);
            $imagePath = 'images/photo/' . $imageName;
        }

        // Create the user
        try {
            $user = client_detailes::create([
                'name' => $validated['name'],
                'age' => $validated['age'],
                'email' => $validated['email'],
                'image' => $imagePath,
                'password' => bcrypt($validated['password']),
            ]);

            // Check if the user was created successfully
            if ($user) {
                return redirect()->route('login')->with('success', 'Registration successful! Please login.');
            } else {
                return back()->with('error', 'Failed to create user. Please try again.');
            }
        } catch (\Exception $e) {
            // Log the error and display a user-friendly message
            \Log::error($e->getMessage());
            return back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }

    // Display the login form
    public function login()
    {
        return view('User.login');
    }
}
