<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $children = Children::all(); // Fetch all children data
        $users = User::all(); 
        // Mengambil semua laporan dan menampilkannya

        $reports = Report::when(request()->search, function ($reports) {
            $reports = $reports->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);

        return view('reports.index', compact('reports', 'children'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $children = Children::all(); // Fetch all children data
        $guru = User::where("role", 'guru')->get();
        return view('reports.create', compact('children', 'guru'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'child_name' => 'required|string|max:255',
            'teacher_name' => 'required|string|max:255', // Validasi untuk kolom baru
            'status' => 'required|string|max:255',
            'report_date' => 'required|date',
            'description' => 'required|string',
            'scores' => 'nullable|numeric', // Validasi untuk kolom baru
            'club' => 'nullable|string|max:255', // Validasi untuk kolom baru
            'teacher_notes' => 'nullable|string',
        ]);
        

        Report::create($request->all());

        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    public function edit(Report $report)
    {
        $children = Children::all(); // Fetch all children data
        $guru = User::where("role", 'guru')->get();
        return view('reports.edit', compact('report', 'children', 'guru'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'child_name' => 'required|string|max:255',
            'teacher_name' => 'required|string|max:255', // Validasi untuk kolom baru
            'status' => 'required|string|max:255',
            'report_date' => 'required|date',
            'description' => 'required|string',
            'scores' => 'nullable|numeric', // Validasi untuk kolom baru
            'club' => 'nullable|string|max:255', // Validasi untuk kolom baru
            'teacher_notes' => 'nullable|string',
        ]);

        try {
            $report = Report::find($id);
            $report->child_name = $request->child_name;
            $report->teacher_name = $request->teacher_name;
            $report->status = $request->status;
            $report->report_date = $request->report_date;
            $report->description = $request->description;
            $report->scores = $request->scores;
            $report->club = $request->club;
            $report->teacher_notes = $request->teacher_notes;

            $report->save();
            return redirect()->route('reports.index')
                ->with('success', 'Report ' . $report->name . ' has been updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

    }

    public function destroy(Report $report)
    {
        if ($report) {
            $report->delete();
            return redirect()->route('reports.index')
                ->with('success', 'Report ' . $report->name . ' has been deleted successfully!');
        } else {
            return back()->with('error', 'Report data not found!');
        }
    }
}
