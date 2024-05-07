<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceMedicine;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreServiceMedReq;

class ServiceMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $service_medicines = ServiceMedicine::when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(10);
        $title = 'Service and Medicines';
        return view('pages.service_medicines.index', compact('service_medicines', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'New Service Medicine';
        return view('pages.service_medicines.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceMedReq $request)
    {
        DB::beginTransaction();
        $validate = $request->validated();
        ServiceMedicine::create($validate);
        DB::commit();
        return redirect(route('service-medicines.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceMedicine $service_medicine)
    {
        $title = 'New Service Medicine';
        $service_medicines = $service_medicine;
        return view('pages.service_medicines.edit', compact('title', 'service_medicines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreServiceMedReq $request, ServiceMedicine $service_medicine)
    {
        DB::beginTransaction();
        $validate = $request->validated();
        $service_medicine->update($validate);
        DB::commit();
        return redirect()->route('service-medicines.index')->with('success', 'Edit Service Medicine Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceMedicine $service_medicine)
    {
        DB::beginTransaction();
        $service_medicine->delete();
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Succesfully Deleted Data'
        ]);
    }
}
