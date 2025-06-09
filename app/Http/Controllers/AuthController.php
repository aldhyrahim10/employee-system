<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.login');
    }

    public function loginAction(LoginRequest $request){
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        } 

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logoutAction(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function resetPassword(Request $request, $id) {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if(Hash::check($validated['old_password'], $user->password)){
            unset($validated['password_confirmation']);

            $user->update($validated);

            return response()->json(['message' => 'Success'], 201);
        } else {
            return response()->json(['message' => 'Password lama salah'], 500);
        }
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
