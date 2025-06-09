<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OffWorkRequest;
use App\Models\Employee;
use App\Models\OffWork;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OffWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $employees = Employee::all();
        $offworks = OffWork::with('employee')->get();

        return view('pages.offwork.index', compact('employees', 'offworks'));
    }

    public function getOneData(Request $request){
        $request->validate([
            'query' => 'required|integer',
        ]);

        $query = $request->get('query');

        $offwork = OffWork::with('employee')->where('id', $query)->first();
        
        return response()->json($offwork);
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
    public function store(OffWorkRequest $request)
    {
        try {
            $employeeId = $request->employee_id;
            $startDate = Carbon::parse($request->start_date);
            $month = $startDate->format('m');
            $year = $startDate->format('Y');

            $checkData = OffWork::where('employee_id', $employeeId)
                ->whereMonth('start_date', $month)
                ->whereYear('start_date', $year)
                ->exists();

            $checkData2 = OffWork::where('employee_id', $employeeId)
                ->whereYear('start_date', $year)
                ->count();

            if ($checkData) {
                return response()->json(['message' => 'Karyawan sudah mengambil cuti di bulan ini.'], 422);
            }

            if($checkData2 > 12){
                return response()->json(['message' => 'Karyawan sudah mengambil cuti sebanyak 12 kali tahun ini.'], 422);
            }

            DB::transaction(function () use ($request) {
                OffWork::create($request->validated());
            });

            return response()->json(['message' => 'Success'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
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
    public function update(OffWorkRequest $request, string $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $validated = $request->validated();
                OffWork::where("id", $id)->update($validated);
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
            OffWork::where('id', $id)->delete();
        });

        return response()->json(['message' => 'Success'], 201);
    }
}
