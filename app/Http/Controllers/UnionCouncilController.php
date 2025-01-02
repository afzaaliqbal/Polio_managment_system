<?php

namespace App\Http\Controllers;

use App\Models\Tehsil;
use App\Models\UnionCouncil;
use App\Models\User;
use Illuminate\Http\Request;

class UnionCouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $councils = UnionCouncil::all();

        return view('UnionCouncil.index', compact('councils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tehsils = Tehsil::all();

        return view('UnionCouncil.create', compact('tehsils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        UnionCouncil::create($request->all());

        return redirect()->route('UnionCouncil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $councils = UnionCouncil::findOrFail($id);

        return view('UnionCouncil.show', compact('councils'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tehsils = Tehsil::all();
        $councils = UnionCouncil::findOrFail($id);

        return view('UnionCouncil.edit', compact('councils', 'tehsils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $worker = UnionCouncil::findOrFail($id);
        $worker->update($request->all());

        return redirect()->route('UnionCouncil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UnionCouncil::findOrFail($id)->delete();

        return redirect()->route('UnionCouncil.index');
    }

    public function assignPolioWorkers($unionCouncilId)
    {
        $unionCouncil = UnionCouncil::findOrFail($unionCouncilId);
        $users = user::with('roles')->get();
        $polioWorkers = [];
        foreach ($users as $user) {
            // Check if the user has the 'admin' role
            if ($user->hasRole('worker')) {
                $polioWorkers[] = $user;
            }
        }

        return view('Admin.union_councils.assign', compact('unionCouncil', 'polioWorkers'));
    }

    // Store the assignment of Polio Workers to a Union Council
    public function storeAssignedPolioWorkers(Request $request, $unionCouncilId)
    {
        $unionCouncil = UnionCouncil::findOrFail($unionCouncilId);

        // Validate the incoming data (array of polio_worker_ids)
        $request->validate([
            'polio_workers' => 'required|array',
            'polio_workers.*' => 'exists:users,id',
        ]);

        // Sync the selected Polio Workers with the Union Council (assign multiple workers)
        $unionCouncil->polioWorkers()->sync($request->input('polio_workers'));

        return redirect()->route('admin.polio-workers.index')->with('success', 'Polio Workers assigned successfully!');
    }
}
