<?php

namespace App\Http\Controllers\Admin;

use App\Swipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class SwipeController extends Controller
    {
        /**
         * Display a list of Services.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $swipes = Swipe::getList();
    
            return view('admin.swipes.index', compact('swipes'));
        }
    
        /**
         * Show the form for creating a new Swipe
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
          //  $status = Swipe::status();
    
            return view('admin.swipes.add');
        }
    
        /**
         * Save new Swipe
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function store()
        {
           // dd(request()->all());
            $validatedData = request()->validate(Swipe::validationRules());
    
            //dd($validatedData);
          //  dd($validatedData);  
          //  $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
          //  $storage = $factory->createStorage();
          //  $database = $factory->createDatabase();
    
          //  $newID = $database->getReference('swipes')->push(['name' => request()->name])->getKey();
    
    
          //  $image = request()->file('icon'); //image file from frontend
    
            //$student = app('firebase.firestore')->database()->collection('Student')->document('defT5uT7SDu9K5RFtIdl');
    
          //  $firebase_storage_path = 'swipes/';
    
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
          //      $validatedData = request()->validate(Swipe::validationRules());
        
                $swipe = Swipe::create($validatedData);
        
                return redirect()->route('admin.swipes.index')->with([
                    'type' => 'success',
                    'message' => 'Swipe added'
                ]);
            // } else {
            //     echo 'error';
            // }
         
        }
    
        /**
         * Show the form for editing the specified Swipe
         *
         * @param \App\Swipe $swipe
         * @return \Illuminate\Http\Response
         */
        public function edit(Swipe $swipe)
        {
         //   $status = Swipe::status();
            return view('admin.swipes.edit', compact('swipe'));
        }
    
        /**
         * Update the Swipe
         *
         * @param \App\Swipe $swipe
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Swipe $swipe)
        {
            $validatedData = request()->validate(
                Swipe::validationRules($swipe->id)
            );
    
            $swipe->update($validatedData);
    
            return redirect()->route('admin.swipes.index')->with([
                'type' => 'success',
                'message' => 'Swipe Updated'
            ]);
        }
    
        /**
         * Delete the Swipe
         *
         * @param \App\Swipe $swipe
         * @return void
         */
        public function destroy(Swipe $swipe)
        {
            // if ($swipe->providers()->count()) {
            //     return redirect()->route('admin.swipes.index')->with([
            //         'type' => 'error',
            //         'message' => 'This record cannot be deleted as there are relationship dependencies.'
            //     ]);
            // }
            // $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
            // $database = $factory->createDatabase();
            // $database->getReference('swipes/'.$swipe->fbID)->remove();
    
    
            $swipe->delete();
    
            return redirect()->route('admin.swipes.index')->with([
                'type' => 'success',
                'message' => 'Swipe deleted successfully'
            ]);
        }
    }
    