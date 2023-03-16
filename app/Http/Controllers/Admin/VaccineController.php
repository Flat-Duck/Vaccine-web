<?php

namespace App\Http\Controllers\Admin;

use App\Vaccine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class VaccineController extends Controller
    {
        /**
         * Display a list of Services.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $vaccines = Vaccine::getList();
    
            return view('admin.vaccines.index', compact('vaccines'));
        }
    
        /**
         * Show the form for creating a new Vaccine
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
          //  $status = Vaccine::status();
    
            return view('admin.vaccines.add');
        }
    
        /**
         * Save new Vaccine
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function store()
        {
           // dd(request()->all());
            $validatedData = request()->validate(Vaccine::validationRules());
    
            //dd($validatedData);
          //  dd($validatedData);  
          //  $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
          //  $storage = $factory->createStorage();
          //  $database = $factory->createDatabase();
    
          //  $newID = $database->getReference('vaccines')->push(['name' => request()->name])->getKey();
    
    
          //  $image = request()->file('icon'); //image file from frontend
    
            //$student = app('firebase.firestore')->database()->collection('Student')->document('defT5uT7SDu9K5RFtIdl');
    
          //  $firebase_storage_path = 'vaccines/';
    
          //  $name = $newID;
    
          //  $localfolder = public_path('firebase-temp-uploads') .'/';
    
          //  $extension  = $image->getClientOriginalExtension();
    
         //   $file = $name. '.png';// . $extension;
    
         //   if ($image->move($localfolder, $file)) {
         //       $uploadedfile = fopen($localfolder.$file, 'r');
    
         //       $storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
    
                //will remove from local laravel folder
         //       unlink($localfolder . $file);
    
         //       echo 'success';
         
         //       request()->merge([ 'fbID' => $newID ]);
          //      $validatedData = request()->validate(Vaccine::validationRules());
        
                $vaccine = Vaccine::create($validatedData);
        
                return redirect()->route('admin.vaccines.index')->with([
                    'type' => 'success',
                    'message' => 'Vaccine added'
                ]);
            // } else {
            //     echo 'error';
            // }
         
        }
    
        /**
         * Show the form for editing the specified Vaccine
         *
         * @param \App\Vaccine $vaccine
         * @return \Illuminate\Http\Response
         */
        public function edit(Vaccine $vaccine)
        {
         //   $status = Vaccine::status();
            return view('admin.vaccines.edit', compact('vaccine'));
        }
    
        /**
         * Update the Vaccine
         *
         * @param \App\Vaccine $vaccine
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Vaccine $vaccine)
        {
            $validatedData = request()->validate(
                Vaccine::validationRules($vaccine->id)
            );
    
            $vaccine->update($validatedData);
    
            return redirect()->route('admin.vaccines.index')->with([
                'type' => 'success',
                'message' => 'Vaccine Updated'
            ]);
        }
    
        /**
         * Delete the Vaccine
         *
         * @param \App\Vaccine $vaccine
         * @return void
         */
        public function destroy(Vaccine $vaccine)
        {
            // if ($vaccine->providers()->count()) {
            //     return redirect()->route('admin.vaccines.index')->with([
            //         'type' => 'error',
            //         'message' => 'This record cannot be deleted as there are relationship dependencies.'
            //     ]);
            // }
            // $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
            // $database = $factory->createDatabase();
            // $database->getReference('vaccines/'.$vaccine->fbID)->remove();
    
    
            $vaccine->delete();
    
            return redirect()->route('admin.vaccines.index')->with([
                'type' => 'success',
                'message' => 'Vaccine deleted successfully'
            ]);
        }
    }
    