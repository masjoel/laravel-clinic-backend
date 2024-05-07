<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ServiceMedicine;
use App\Http\Controllers\Controller;

class ServiceMedicinesController extends Controller
{
    //index
    public function index(Request $request)
    {
        $service_medicines = ServiceMedicine::when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $service_medicines,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }
}