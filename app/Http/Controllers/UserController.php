<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Users';
        $users = User::
            when($request->input('search'), function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'New User';
        return view('pages.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        $validate = $request->validated();
        $validate['password'] = Hash::make($request->password);
        User::create($validate);
        DB::commit();
        return redirect(route('users.index'))->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit')->with(['user' => $user, 'title' => 'Edit User']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $pass = $user->password;
        if ($request->password) {
            $pass = Hash::make($request->password);
        }
        $validate = $request->validated();
        $validate['password'] = $pass;
        $user->update($validate);
        return redirect()->route('users.index')->with('success', 'Edit User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        $user->delete();
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Succesfully Deleted Data'
        ]);
    }
}
