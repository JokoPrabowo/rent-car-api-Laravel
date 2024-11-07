<?php

namespace App\Http\Controllers\Api;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Resources\CarsResource;
use Illuminate\Support\Facades\Validator;

class CarsController
{
    public function index()
    {
        //get all posts
        $cars = Cars::latest()->paginate(5);

        //return collection of posts as a resource
        return new CarsResource(true, 'List Data Mobil', $cars);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'renter_id'             => 'required',
            'brand'                 => 'required',
            'model'                 => 'required',
            'color'                 => 'required',
            'year'                  => 'required',
            'rental_price_per_day'  => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create car
        $cars = Cars::create([
            'renter_id'             => $request->renter_id,
            'brand'                 => $request->brand,
            'model'                 => $request->model,
            'color'                 => $request->color,
            'year'                  => $request->year,
            'rental_price_per_day'  => $request->rental_price_per_day,
        ]);

        //return response
        return new CarsResource(true, 'Data Mobil Berhasil Ditambahkan!', $cars);
    }
}
