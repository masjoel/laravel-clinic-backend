<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleReq;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\DB;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Schedule';
        $doctorSchedules = DoctorSchedule::join('doctors', 'doctor_schedules.doctor_id', '=', 'doctors.id')
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('doctors.doctor_name', 'like', '%' . $search . '%');
            })
            ->select('doctor_schedules.*', 'doctors.doctor_name')
            ->orderBy('doctor_id', 'asc')
            ->paginate(10);
        return view('pages.doctor_schedules.index', compact('doctorSchedules', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $title = 'New Schedule';
        return view('pages.doctor_schedules.create', compact('doctors', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleReq $request)
    {
        DB::beginTransaction();
        $validate = $request->validated();

        if ($request->senin) {
            $validate['day'] = 'Senin';
            $validate['time'] = $request->senin;
            DoctorSchedule::create($validate);
        }

        if ($request->selasa) {
            $validate['day'] = 'Selasa';
            $validate['time'] = $request->selasa;
            DoctorSchedule::create($validate);
        }

        if ($request->rabu) {
            $validate['day'] = 'Rabu';
            $validate['time'] = $request->rabu;
            DoctorSchedule::create($validate);
        }

        if ($request->kamis) {
            $validate['day'] = 'Kamis';
            $validate['time'] = $request->kamis;
            DoctorSchedule::create($validate);
        }

        if ($request->jumat) {
            $validate['day'] = 'Jumat';
            $validate['time'] = $request->jumat;
            DoctorSchedule::create($validate);
        }

        if ($request->sabtu) {
            $validate['day'] = 'Sabtu';
            $validate['time'] = $request->sabtu;
            DoctorSchedule::create($validate);
        }

        if ($request->minggu) {
            $validate['day'] = 'Minggu';
            $validate['time'] = $request->minggu;
            DoctorSchedule::create($validate);
        }
        DB::commit();
        return redirect(route('doctor-schedules.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorSchedule $doctorSchedule)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        $doctors = Doctor::all();
        $title = 'Edit Schedule';
        return view('pages.doctor_schedules.edit', compact('doctorSchedule', 'doctors', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreScheduleReq $request, DoctorSchedule $doctorSchedule)
    {
        $validate = $request->validated();
        $doctorSchedule->update($validate);
        return redirect()->route('doctor-schedules.index')->with('success', 'Edit Schedule Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {

        DB::beginTransaction();
        $doctorSchedule->delete();
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Succesfully Deleted Data'
        ]);
    }
}
