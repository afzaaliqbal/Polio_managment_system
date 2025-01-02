<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::with('roles')->get();
        $polioWorkers = [];
        foreach ($users as $user) {
            // Check if the user has the 'admin' role
            if ($user->hasRole('worker')) {
                $polioWorkers[] = $user;
            }
        }

        return view('Admin.dashboard', compact('polioWorkers'));
    }

    public function polio_workers()
    {
        $users = user::with('roles', 'assigned_area')->get();
        $polioWorkers = [];
        foreach ($users as $user) {
            // Check if the user has the 'admin' role
            if ($user->hasRole('worker')) {
                $polioWorkers[] = $user;
            }
        }

        return view('Admin.union_councils.index', compact('polioWorkers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('Admin.polio-workers');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $worker = User::findOrFail($id);

        return view('Admin.polio-workers.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $worker = user::with('assigned_area')->findOrFail($id);

        return view('Admin.polio-workers.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $worker = User::findOrFail($id);
        $worker->update($request->all());

        return redirect()->route('Admin.polio-workers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.polio-workers');
    }
}
