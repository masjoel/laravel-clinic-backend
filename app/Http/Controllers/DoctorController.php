<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDoctorReq;
use App\Http\Requests\UpdateDoctorReq;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Doctors';
        $doctors = Doctor::
            when($request->input('search'), function ($query, $search) {
                return $query->where('doctor_name', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', compact('doctors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'New Doctor';
        return view('pages.doctors.create', compact('title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorReq $request)
    {
        DB::beginTransaction();
        $validate = $request->validated();
        $imagePath = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extFile = $image->getClientOriginalExtension();
            $fileSize = $image->getSize();
            $fileSizeInKB = $fileSize / 1024;
            $fileSizeInMB = $fileSizeInKB / 1024;
            if (!in_array($extFile, ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp']) || $fileSizeInMB > 4) {
                return back()->with('error', 'File harus berupa image (jpeg, png, jpg, gif, svg, webp) max. size 4 MB')->withInput();
                DB::rollBack();
            }
            $nameFile = Uuid::uuid1()->getHex() . '.' . $extFile;
            $imagePath = 'doctors/'.$nameFile;
            $image->storeAs('doctors', $nameFile, 'public');
        }
        $validate['photo'] = $imagePath;
        Doctor::create($validate);
        DB::commit();
        return redirect(route('doctors.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('pages.doctors.edit')->with(['doctor' => $doctor, 'title' => 'Edit Doctor']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorReq $request, Doctor $doctor)
    {
        DB::beginTransaction();
        $imagePath = $doctor->photo;
        $imagePathOld = $doctor->photo;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extFile = $image->getClientOriginalExtension();
            $fileSize = $image->getSize();
            $fileSizeInKB = $fileSize / 1024;
            $fileSizeInMB = $fileSizeInKB / 1024;
            if (!in_array($extFile, ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp']) || $fileSizeInMB > 4) {
                return back()->with('error', 'File harus berupa image (jpeg, png, jpg, gif, svg, webp) max. size 4 MB')->withInput();
                DB::rollBack();
            }
            $nameFile = Uuid::uuid1()->getHex() . '.' . $extFile;
            $imagePath = 'doctors/'.$nameFile;
            $image->storeAs('doctors', $nameFile, 'public');
            if ($imagePathOld) {
                Storage::disk('public')->delete($imagePathOld);
            }
        }
        $validate = $request->validated();
        $validate['photo'] = $imagePath;
        $doctor->update($validate);
        DB::commit();
        return redirect()->route('doctors.index')->with('success', 'Edit Doctor Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        DB::beginTransaction();
        if ($doctor->photo) {
            Storage::disk('public')->delete($doctor->photo);
        }
        $doctor->delete();
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Succesfully Deleted Data'
        ]);
    }
}
