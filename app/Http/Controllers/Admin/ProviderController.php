<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use App\Service;
use App\Http\Controllers\Controller;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Request\CreateUser;
use Kreait\Firebase\Database;

class ProviderController extends Controller
{
    /**
     * Display a list of Providers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::getList();

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new Provider
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.providers.add', compact('services'));
    }

    /**
     * Save new Provider
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
        $database = $factory->createDatabase();
        $auth = $factory->createAuth();

        $newPorviderId = $database->getReference('providers')->push([
            'name' => request()->name,
            'phone' =>  request()->phone,
            'email' =>  request()->email,
            'location' => request()->location,
            'user_name' => request()->user_name,
            'password' =>  request()->password,
            ])->getKey();
        $database->getReference('Auth/'.$newPorviderId."/isProvider")->set(true);
            
        $request = CreateUser::new()->withUid($newPorviderId)
            ->withUnverifiedEmail(request()->email)
            ->withPhoneNumber(request()->phone)
            ->withClearTextPassword( request()->password)
            ->withDisplayName(request()->name)
            ->withPhotoUrl('http://www.example.com/12345678/photo.png');
            
         $createdUser = $auth->createUser($request);

        
        request()->merge(['fbID'=>$newPorviderId]);
        $validatedData = request()->validate(Provider::validationRules());

        $validatedData['password'] = bcrypt($validatedData['password']);
        unset($validatedData['services']);
        $provider = Provider::create($validatedData);

        foreach (request()->services as $k => $serviceID) {
            $service = Service::find($serviceID);
            $database->getReference('provider_service/'.$newPorviderId."/".$service->fbID)->set(true);
            $database->getReference('service_provider/'.$service->fbID."/" .$newPorviderId)->set(true);
        }
        $provider->services()->sync(request('services'));

        return redirect()->route('admin.providers.index')->with([
            'type' => 'success',
            'message' => 'Provider added'
        ]);
    }

    /**
     * Show the form for editing the specified Provider
     *
     * @param \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        $services = Service::all();

        $provider->services = $provider->services->pluck('id')->toArray();

        return view('admin.providers.edit', compact('provider', 'services'));
    }

    /**
     * Update the Provider
     *
     * @param \App\Provider $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Provider $provider)
    {

        $validatedData = request()->validate(
            Provider::validationRules($provider->id)
        );

        $validatedData['password'] = bcrypt($validatedData['password']);
        unset($validatedData['services']);
        $provider->update($validatedData);

        $provider->services()->sync(request('services'));

        return redirect()->route('admin.providers.index')->with([
            'type' => 'success',
            'message' => 'Provider Updated'
        ]);
    }

    /**
     * Delete the Provider
     *
     * @param \App\Provider $provider
     * @return void
     */
    public function destroy(Provider $provider)
    {
        if ($provider->services()->count()) {
            return redirect()->route('admin.providers.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        
        $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
        $database = $factory->createDatabase();
        $auth = $factory->createAuth();
        
        $uId = $provider->fbId;
        $database->getReference('providers/'.$uId)->remove();

        $auth->deleteUser($uId);
        $provider->delete();

        return redirect()->route('admin.providers.index')->with([
            'type' => 'success',
            'message' => 'Provider deleted successfully'
        ]);
    }
}
