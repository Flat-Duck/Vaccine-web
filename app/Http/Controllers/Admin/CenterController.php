<?php

namespace App\Http\Controllers\Admin;

use App\Center;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    /**
     * Display a list of Services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::getList();

        return view('admin.centers.index', compact('centers'));
    }

    /**
     * Show the form for creating a new Center
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.centers.add');
    }

    /**
     * Save new Center
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Center::validationRules());
        $center = Center::create($validatedData);
        return redirect()->route('admin.centers.index')->with([
                'type' => 'success',
                'message' => 'Center added'
            ]);

    }

    /**
     * Show the form for editing the specified Center
     *
     * @param \App\Center $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        return view('admin.centers.edit', compact('center'));
    }

    /**
     * Update the Center
     *
     * @param \App\Center $center
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Center $center)
    {
        $validatedData = request()->validate(
            Center::validationRules($center->id)
        );

        $center->update($validatedData);

        return redirect()->route('admin.centers.index')->with([
            'type' => 'success',
            'message' => 'Center Updated'
        ]);
    }

    /**
     * Delete the Center
     *
     * @param \App\Center $center
     * @return void
     */
    public function destroy(Center $center)
    {
        $center->delete();
        return redirect()->route('admin.centers.index')->with([
            'type' => 'success',
            'message' => 'Center deleted successfully'
        ]);
    }
}
