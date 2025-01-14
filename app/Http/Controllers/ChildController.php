<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where("role", 'orang_tua')->get(); 
        // Mengambil semua laporan dan menampilkannya
        $childs = Children::when(request()->search, function ($childs) {
            $childs = $childs->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);

        return view('childs.index', compact('childs', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where("role", 'orang_tua')->get();
        return view('childs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'NISN' => 'required|string|max:8',
            'class' => 'required|string',
            'gender' => 'required|string',
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
        $users = User::where("role", 'orang_tua')->get();
        return view('childs.edit', compact('child', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'NISN' => 'required|string|max:8',
            'class' => 'required|string',
            'gender' => 'required|string',
            'birth' => 'required|date',
            'parent' => 'required|string|max:255',
            'address' => 'required|string|max:500',
        ]);

        try {
            $child = Children::find($id);
            $child->name = $request->name;
            $child->NISN = $request->NISN;
            $child->class = $request->class;
            $child->gender = $request->gender;
            $child->birth = $request->birth;
            $child->parent = $request->parent;
            $child->address = $request->address;

            // dd($child);
            $child->save();
            return redirect()->route('childs.index')
                ->with('success', 'Child ' . $child->name . ' has been updated successfully!');
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
                ->with('success', 'Child ' . $child->name . ' has been deleted successfully!');
        } else {
            return back()->with('error', 'Child data not found!');
        }
    }
}
