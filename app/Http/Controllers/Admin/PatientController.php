<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
use App\Http\Controllers\Controller;

// use Kreait\Firebase;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;
// use Kreait\Firebase\Database;

class PatientController extends Controller
{
    /**
     * Display a list of Services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::getList();


        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new Patient
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Patient::status();

        return view('admin.patients.add', compact('status'));
    }

        /**
     * Show the form for creating a new Patient
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $patient->load('swipes');

        return view('admin.patients.show', compact('patient'));
    }

    /**
     * Save new Patient
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        
        
        
        
        $validatedData = request()->validate(Patient::createValidationRules());
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['email'] = $validatedData['username'].'@vaccine.com';
        $patient = Patient::create($validatedData);
    
            return redirect()->route('admin.patients.index')->with([
                'type' => 'success',
                'message' => 'Patient added'
            ]);

    }

    /**
     * Show the form for editing the specified Patient
     *
     * @param \App\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $status = Patient::status();
        return view('admin.patients.edit', compact('patient','status'));
    }

    /**
     * Update the Patient
     *
     * @param \App\Patient $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Patient $patient)
    {
        $validatedData = request()->validate(
            Patient::updateValidationRules($patient->id)
        );

        $patient->update($validatedData);

        return redirect()->route('admin.patients.index')->with([
            'type' => 'success',
            'message' => 'Patient Updated'
        ]);
    }

    /**
     * Delete the Patient
     *
     * @param \App\Patient $patient
     * @return void
     */
    public function destroy(Patient $patient)
    {
        // if ($patient->providers()->count()) {
        //     return redirect()->route('admin.patients.index')->with([
        //         'type' => 'error',
        //         'message' => 'This record cannot be deleted as there are relationship dependencies.'
        //     ]);
        // }
        // $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
        // $database = $factory->createDatabase();
        // $database->getReference('patients/'.$patient->fbID)->remove();


        $patient->delete();

        return redirect()->route('admin.patients.index')->with([
            'type' => 'success',
            'message' => 'Patient deleted successfully'
        ]);
    }
}
