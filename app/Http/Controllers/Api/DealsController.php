<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealsResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Deals;

class DealsController extends Controller
{
    public function index()
    {
        //get all posts
        $deals = Deals::latest()->paginate(5);

        //return collection of posts as a resource
        return new DealsResource(true, 'List Data Transaksi', $deals);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'renter_id'             => 'required',
            'car_id'                => 'required',
            'customer_id'           => 'required',
            'rental_time_per_day'   => 'required',
            'total_rental_price'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create car
        $deals = Deals::create([
            'renter_id'             => $request->renter_id,
            'car_id'                => $request->car_id,
            'customer_id'           => $request->customer_id,
            'rental_time_per_day'   => $request->rental_time_per_day,
            'total_rental_price'    => $request->total_rental_price,
        ]);

        //return response
        return new DealsResource(true, 'Data Transaksi Berhasil Ditambahkan!', $deals);
    }

    public function show($id)
    {
        //find cars by ID
        $deals = Deals::find($id);

        //return single car as a resource
        return new DealsResource(true, 'Detail Data Transaksi!', $deals);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'rental_time_per_day'   => 'required',
            'total_rental_price'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $deals = Deals::find($id);

        $deals->update([
            'rental_time_per_day'   => $request->rental_time_per_day,
            'total_rental_price'    => $request->total_rental_price,
        ]);

        //return response
        return new DealsResource(true, 'Data Transaksi Berhasil Diubah!', $deals);
    }
}
