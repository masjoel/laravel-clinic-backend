<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::when($request->input('nik'), function ($query, $name) {
            return $query->where('nik', 'like', '%' . $name . '%');
        })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $patients,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'kk' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'address_line' => 'required',
            'is_deceased' => 'required',
            'city' => 'required',
            'city_code' => 'required',
            'province' => 'required',
            'province_code' => 'required',
            'district' => 'required',
            'district_code' => 'required',
            'village' => 'required',
            'village_code' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'postal_code' => 'required',
            'marital_status' => 'required',
        ]);

        $patient = Patient::create($request->all());

        return response([
            'data' => $patient,
            'message' => 'Patient created.',
            'status' => 'OK'
        ], 201);
    }
}
