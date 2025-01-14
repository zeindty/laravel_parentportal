<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua laporan dan menampilkannya
        $reports = Report::when($request->search, function ($query) use ($request) {
            return $query->where('child_name', 'like', '%' . $request->search . '%')
                         ->orWhere('category', 'like', '%' . $request->search . '%');
        })->paginate(10);

        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'child_name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'report_date' => 'required|date',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_notes' => 'nullable|string',
            
        ]);

        Report::create($validated);

        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'child_name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'report_date' => 'required|date',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_notes' => 'nullable|string',
        ]);

        $report->update($validated);

        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }
}
