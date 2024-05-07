<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PatientSchedule;
use App\Http\Controllers\Controller;

class PatientScheduleController extends Controller
{
    public function index(Request $request)
    {
        $patientSchedules = PatientSchedule::when($request->input('patient_id'), function ($query, $name) {
                return $query->where('patient_id', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $patientSchedules,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'schedule_time' => 'required',
            'complaint' => 'required',
            'status' => 'required',
        ]);

        $patientSchedule = PatientSchedule::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'schedule_time' => $request->schedule_time,
            'complaint' => $request->complaint,
            'status' => 'waiting',
            'no_antrian' => 1,

        ]);

        return response([
            'data' => $patientSchedule,
            'message' => 'Patient schedule stored',
            'status' => 'OK'
        ], 200);
    }
}
