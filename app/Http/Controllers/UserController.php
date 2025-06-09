<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();

        return view('pages.user.index', compact('users'));
    }

    public function getOneData(Request $request){
        $request->validate([
            'query' => 'required|integer',
        ]);

        $query = $request->get('query');

        $user = User::where('id', $query)->first();
        
        return response()->json($user);
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
    public function store(UserRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();
                $validated['password'] = bcrypt($validated['password']);
                User::create($request->validated());
            });

            return response()->json(['message' => 'Success'], 201);
        } catch (\Throwable $th) {
            
            return response()->json(['message' => $th], 500);
        }
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
    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $validated = $request->validated();
                User::where("id", $id)->update($validated);
            });
            return response()->json(['message' => 'Success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function() use ($id) {
            User::where('id', $id)->delete();
        });

        return response()->json(['message' => 'Success'], 201);
    }
}
