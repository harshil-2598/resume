<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemoveSessionDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function deleteExpSession(Request $request)
    {

        $index = $request->input('index');

        $education = collect(session('expe', []));
        // dd($education);
        // Remove the selected item by index
        $education->forget($index);

        // Re-index the collection and update session
        $education = $education->values();
        session(['expe' => $education]);

        return redirect()->back()->with('success', 'Experience entry deleted.');
    }


    public function deleteSkill(Request $request)
    {
        $index = $request->input('index');
        $skills = session()->get('skills', []);

        if (isset($skills[$index])) {
            unset($skills[$index]); // remove skill
            $skills = array_values($skills); // reindex array
            session()->put('skills', $skills);
        }

        return back()->with('success', 'Skill deleted successfully');
    }

    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
