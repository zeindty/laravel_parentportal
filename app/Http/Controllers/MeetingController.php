<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all(); 
        // Mengambil semua laporan dan menampilkannya
        $meetings = Meeting::when($request->search, function ($query) use ($request) {
            return $query->where('child_name', 'like', '%' . $request->search . '%')
                         ->orWhere('category', 'like', '%' . $request->search . '%');
        })->paginate(10);
        

        return view('meetings.index', compact('meetings', 'users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function cetak(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $meetings = Meeting::whereBetween('meeting_date', [$start_date, $end_date])->get();

        return view('meetings.print', compact('meetings', 'start_date', 'end_date'));
    }

    
    public function cetakPdf(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $meetings = Meeting::whereBetween('meeting_date', [$start_date, $end_date])->get();

        $pdf = PDF::loadView('meetings.pdf', compact('meetings', 'start_date', 'end_date'));
        return $pdf->download('meeting_report.pdf');
    }

    public function create()
    {
        // $user = Auth::user();
        $users = User::where("role", 'orang_tua')->get();
        $guru = User::where("role", 'guru')->get();
        return view('meetings.create', compact('users', 'guru'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:255',
            'teacher_id' => 'required|string|max:255',
            'meeting_date' => 'required|date',
            'meeting_time' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            
        ]);

        Meeting::create($validated);

        return redirect()->route('meetings.index')->with('success', 'Meeting created successfully.');
    }

    public function edit(Meeting $meeting)
    {
        $users = User::where("role", 'orang_tua')->get();
        $guru = User::where("role", 'guru')->get();

        return view('meetings.edit', compact('meeting', 'users', 'guru'));
    }

    public function update(Request $request, Meeting $meeting)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:255',
            'teacher_id' => 'required|string|max:255',
            'meeting_date' => 'required|date',
            'meeting_time' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $meeting->update($validated);

        return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully.');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return redirect()->route('meetings.index')->with('success', 'Meeting deleted successfully.');
    }



}
