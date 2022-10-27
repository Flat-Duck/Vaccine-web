<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Http\Controllers\Controller;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class ServiceController extends Controller
{
    /**
     * Display a list of Services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::getList();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new Service
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
    }

    /**
     * Save new Service
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Service::validationRules());
     
        $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
        $storage = $factory->createStorage();
        $database = $factory->createDatabase();

        $newID = $database->getReference('services')->push(['name' => request()->name])->getKey();


        $image = request()->file('icon'); //image file from frontend

        //$student = app('firebase.firestore')->database()->collection('Student')->document('defT5uT7SDu9K5RFtIdl');

        $firebase_storage_path = 'services/';

        $name = $newID;

        $localfolder = public_path('firebase-temp-uploads') .'/';

        $extension  = $image->getClientOriginalExtension();

        $file = $name. '.png';// . $extension;

        if ($image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder.$file, 'r');

            $storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);

            //will remove from local laravel folder
            unlink($localfolder . $file);

            echo 'success';
     
            request()->merge([ 'fbID' => $newID ]);
            $validatedData = request()->validate(Service::validationRules());
    
            $service = Service::create($validatedData);
    
            return redirect()->route('admin.services.index')->with([
                'type' => 'success',
                'message' => 'Service added'
            ]);
        } else {
            echo 'error';
        }
     
    }

    /**
     * Show the form for editing the specified Service
     *
     * @param \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the Service
     *
     * @param \App\Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Service $service)
    {
        $validatedData = request()->validate(
            Service::validationRules($service->id)
        );

        $service->update($validatedData);

        return redirect()->route('admin.services.index')->with([
            'type' => 'success',
            'message' => 'Service Updated'
        ]);
    }

    /**
     * Delete the Service
     *
     * @param \App\Service $service
     * @return void
     */
    public function destroy(Service $service)
    {
        if ($service->providers()->count()) {
            return redirect()->route('admin.services.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }
        $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
        $database = $factory->createDatabase();
        $database->getReference('services/'.$service->fbID)->remove();


        $service->delete();

        return redirect()->route('admin.services.index')->with([
            'type' => 'success',
            'message' => 'Service deleted successfully'
        ]);
    }
}
