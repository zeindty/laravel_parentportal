<?php

namespace App\Http\Controllers;

use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childs = Children::when(request()->search, function($childs) {
            $childs = $childs->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);

        return view('childs.index', compact('childs'))
        ->with('i', (request()->input('page',1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('childs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'gender' => 'required|string',
        'age' => 'required|integer',
        'birth' => 'required|date',
        'parent' => 'required|string|max:255',
        'address' => 'required|string|max:500',
    ]);

    // Simpan data ke database
    Children::create($request->all());

    return redirect()->route('childs.index')
        ->with('success', 'Child has been added successfully!');
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
    public function edit(Children $child)
    {
        return view('childs.edit', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'birth' => 'required|date',
            'parent' => 'required|string|max:255',
            'address' => 'required|string|max:500',
        ]);

        try {
            $child = Children::find($id);
            // dd($child->first());
            $child->name = $request->name;
            $child->gender = $request->gender;
            $child->age = $request->age;
            $child->birth = $request->birth;
            $child->parent = $request->parent;
            $child->address = $request->address;

            // dd($child);
            $child->save();
            return redirect()->route('childs.index')
            ->with('success', 'Child '.$child->name.' has been updated successfully!');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Children $child)
    {
        if ($child) {
            $child->delete();
            return redirect()->route('childs.index')
            ->with('success', 'Child '.$child->name.' has been deleted successfully!');
        } else {
            return back()->with('error', 'Child data not found!');
        } 
    }
}
