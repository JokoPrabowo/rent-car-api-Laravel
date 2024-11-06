<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealsResource;
use Illuminate\Http\Request;
use App\Models\Deals;

class DealsController extends Controller
{
    public function index()
    {
        //get all posts
        $deals = Deals::latest()->paginate(5);

        //return collection of posts as a resource
        return new DealsResource(true, 'List Data Deals', $deals);
    }
}
