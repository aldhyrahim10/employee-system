<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        return view('pages.employee.index', compact('employees'));
    }

    public function getOneData(Request $request){
        $request->validate([
            'query' => 'required|integer',
        ]);

        $query = $request->get('query');

        $employee = Employee::where('id', $query)->first();
        
        return response()->json($employee);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Employee::create($request->validated());
            });

           return response()->json(['message' => 'Success'], 201);

        } catch (\Exception $th) {

            return response()->json(['message' => 'Internal error'], 500);
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
    public function update(EmployeeRequest $request, string $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $validated = $request->validated();
                Employee::where("id", $id)->update($validated);
            });
            return response()->json(['message' => 'Success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Internal error'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function() use ($id) {
            Employee::where('id', $id)->delete();
        });

        return response()->json(['message' => 'Success'], 201);
    }
}
