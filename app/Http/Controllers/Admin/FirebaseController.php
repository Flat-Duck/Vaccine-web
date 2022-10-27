<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
//
    public function index()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
        $database = $factory->createDatabase();

        $newPost = $database->getReference('blog/posts')->push([
            'title' => 'Post title',
            'body' => 'This should probably be longer.'
            ]);
        print_r($newPost);


        // $database->getReference('config/website')->set([
        //         'name' => 'My Application',
        //         'emails' => [
        //             'support' => 'support@domain.tld',
        //             'sales' => 'sales@domain.tld',
        //         ],
        //         'website' => 'https://app.domain.tld',
        //         ]);
                
        // $database->getReference('config/website/name')->set('New name');


        // $uid = 'some-user-id';
        // $postData = [
        //     'title' => 'My awesome post title',
        //     'body' => 'This text should be longer',
        // ];

        // // Create a key for a new post
        // $newPostKey = $database->getReference('posts')->push()->getKey();

        // $updates = [
        //     'blog/posts/'.$newPostKey => $postData,
        //     'user-posts/'.$uid.'/'.$newPostKey => $postData,
        // ];

        // // this is the root reference
        // $database->getReference()->update($updates);

        // dd($newPostKey);
    }
}
