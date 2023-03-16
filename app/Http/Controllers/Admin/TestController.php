<?php

namespace App\Http\Controllers\Admin;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class TestController extends Controller
    {
        /**
         * Display a list of Services.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $tests = Test::getList();
    
            return view('admin.tests.index', compact('tests'));
        }
    
        /**
         * Show the form for creating a new Test
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
          //  $status = Test::status();
    
            return view('admin.tests.add');
        }
    
        /**
         * Save new Test
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function store()
        {
           // dd(request()->all());
            $validatedData = request()->validate(Test::validationRules());
    
            //dd($validatedData);
          //  dd($validatedData);  
          //  $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
          //  $storage = $factory->createStorage();
          //  $database = $factory->createDatabase();
    
          //  $newID = $database->getReference('tests')->push(['name' => request()->name])->getKey();
    
    
          //  $image = request()->file('icon'); //image file from frontend
    
            //$student = app('firebase.firestore')->database()->collection('Student')->document('defT5uT7SDu9K5RFtIdl');
    
          //  $firebase_storage_path = 'tests/';
    
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
          //      $validatedData = request()->validate(Test::validationRules());
        
                $test = Test::create($validatedData);
        
                return redirect()->route('admin.tests.index')->with([
                    'type' => 'success',
                    'message' => 'Test added'
                ]);
            // } else {
            //     echo 'error';
            // }
         
        }
    
        /**
         * Show the form for editing the specified Test
         *
         * @param \App\Test $test
         * @return \Illuminate\Http\Response
         */
        public function edit(Test $test)
        {
         //   $status = Test::status();
            return view('admin.tests.edit', compact('test'));
        }
    
        /**
         * Update the Test
         *
         * @param \App\Test $test
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Test $test)
        {
            $validatedData = request()->validate(
                Test::validationRules($test->id)
            );
    
            $test->update($validatedData);
    
            return redirect()->route('admin.tests.index')->with([
                'type' => 'success',
                'message' => 'Test Updated'
            ]);
        }
    
        /**
         * Delete the Test
         *
         * @param \App\Test $test
         * @return void
         */
        public function destroy(Test $test)
        {
            // if ($test->providers()->count()) {
            //     return redirect()->route('admin.tests.index')->with([
            //         'type' => 'error',
            //         'message' => 'This record cannot be deleted as there are relationship dependencies.'
            //     ]);
            // }
            // $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
            // $database = $factory->createDatabase();
            // $database->getReference('tests/'.$test->fbID)->remove();
    
    
            $test->delete();
    
            return redirect()->route('admin.tests.index')->with([
                'type' => 'success',
                'message' => 'Test deleted successfully'
            ]);
        }
    }
    