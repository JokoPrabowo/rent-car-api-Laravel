<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        //get all posts
        $users = User::latest()->paginate(5);

        //return collection of posts as a resource
        return new UsersResource(true, 'List Data Users', $users);
    }
}
