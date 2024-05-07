<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::when($request->input('name'), function ($query, $doctor_name) {
                return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            })
            ->orderBy('id', 'desc')
            ->get();
        return response([
            'data' => $doctors,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }
    public function show(Doctor $doctor)
    {
        return response([
            'data' => $doctor,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }
}
