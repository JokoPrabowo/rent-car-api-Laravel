<?php

namespace App\Http\Controllers\Api;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Resources\CarsResource;

class CarsController
{
    public function index()
    {
        //get all posts
        $cars = Cars::latest()->paginate(5);

        //return collection of posts as a resource
        return new CarsResource(true, 'List Data Cars', $cars);
    }
}
