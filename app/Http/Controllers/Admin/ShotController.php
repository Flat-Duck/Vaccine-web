<?php

namespace App\Http\Controllers\Admin;

use App\Shot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class ShotController extends Controller
    {
        /**
         * Display a list of Services.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $shots = Shot::getList();
    
            return view('admin.shots.index', compact('shots'));
        }
    
        /**
         * Show the form for creating a new Shot
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
          //  $status = Shot::status();
    
            return view('admin.shots.add');
        }
    
        /**
         * Save new Shot
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function store()
        {
           // dd(request()->all());
            $validatedData = request()->validate(Shot::validationRules());
    
            //dd($validatedData);
          //  dd($validatedData);  
          //  $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
          //  $storage = $factory->createStorage();
          //  $database = $factory->createDatabase();
    
          //  $newID = $database->getReference('shots')->push(['name' => request()->name])->getKey();
    
    
          //  $image = request()->file('icon'); //image file from frontend
    
            //$student = app('firebase.firestore')->database()->collection('Student')->document('defT5uT7SDu9K5RFtIdl');
    
          //  $firebase_storage_path = 'shots/';
    
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
          //      $validatedData = request()->validate(Shot::validationRules());
        
                $shot = Shot::create($validatedData);
        
                return redirect()->route('admin.shots.index')->with([
                    'type' => 'success',
                    'message' => 'Shot added'
                ]);
            // } else {
            //     echo 'error';
            // }
         
        }
    
        /**
         * Show the form for editing the specified Shot
         *
         * @param \App\Shot $shot
         * @return \Illuminate\Http\Response
         */
        public function edit(Shot $shot)
        {
         //   $status = Shot::status();
            return view('admin.shots.edit', compact('shot'));
        }
    
        /**
         * Update the Shot
         *
         * @param \App\Shot $shot
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Shot $shot)
        {
            $validatedData = request()->validate(
                Shot::validationRules($shot->id)
            );
    
            $shot->update($validatedData);
    
            return redirect()->route('admin.shots.index')->with([
                'type' => 'success',
                'message' => 'Shot Updated'
            ]);
        }
    
        /**
         * Delete the Shot
         *
         * @param \App\Shot $shot
         * @return void
         */
        public function destroy(Shot $shot)
        {
            // if ($shot->providers()->count()) {
            //     return redirect()->route('admin.shots.index')->with([
            //         'type' => 'error',
            //         'message' => 'This record cannot be deleted as there are relationship dependencies.'
            //     ]);
            // }
            // $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
            // $database = $factory->createDatabase();
            // $database->getReference('shots/'.$shot->fbID)->remove();
    
    
            $shot->delete();
    
            return redirect()->route('admin.shots.index')->with([
                'type' => 'success',
                'message' => 'Shot deleted successfully'
            ]);
        }
    }
    