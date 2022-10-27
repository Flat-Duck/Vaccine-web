<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Swipe;
use App\Shot;
use App\Patient;
use App\Center;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;


class HomeController extends ApiController
{
    public function posts()
    {
        $posts = Post::all();

        return $this->sendResponse("Posts Loaded", $posts);
    }

    public function swipes()
    {
        $swipes = Swipe::all(); //request()->user()->swipes;

        return $this->sendResponse("Swipes Loaded", $swipes);
    }
    public function shots()
    {
        $shots = Shot::all(); //request()->user()->shots;

        return $this->sendResponse("Shots Loaded", $shots);
    }

    public function centers()
    {
        $centers = Center::all();

        return $this->sendResponse("Centers Loaded", $centers);
    }

    public function main()
    {
        $data['all']  = Patient::all()->count();
        $data['well'] = Patient::where('status', 'متعافي')->get()->count();
        $data['dead'] = Patient::where('status', 'متوفي')->get()->count();
        $data['infected'] = Patient::where('status', 'مصاب')->get()->count();
        
        return $this->sendResponse("Status Loaded", [$data]);
    }
    public function updatePassword()
    {
        $user = request()->user();
         return $this->sendResponse("password Changed Successful", $user);
        $user->password = bcrypt(request()->password);
        $user->save();

        return $this->sendResponse("password Changed Successful", $user);
    }
}
