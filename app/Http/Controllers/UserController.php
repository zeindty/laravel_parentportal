<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::when(request()->search, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',
            'role' => 'required|string',
        ]);

        try {
            $user = new User([
                'name'  => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'role' => $request->role,
            ]);

            $user->save();
            return redirect()->route('users.index')
                ->with('success', 'User ' . $user->name . ' has been added successfully!');
        } catch (\Throwable $th) {
            return back()->with(['error' => $th->getMessage()]);
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,' . $id,
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',
            // 'password' => 'required|string',
            // 'password_confirmation' => 'nullable|same:password'
            'role' => 'required|string',
        ]);

        try {
            $user = User::find($id);
            // dd($user->first());
            $user->name = $request->name;
            $user->email = $request->email;
             $user->role = $request->role;
            $user->password = Hash::make($request->password);
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            return redirect()->route('users.index')
                ->with('success', 'User ' . $user->name . ' has been updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')
                ->with('success', 'User ' . $user->name . ' has been deleted successfully!');
        } else {
            return back()->with('error', 'User not found!');
        }
    }
}
