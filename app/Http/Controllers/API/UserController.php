<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select("select * from User");

        return response()->json([
            'users' => UserResource::collection($users),
            'message' => 'Malumotlar olindi ...'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $role = $request->role;
        $active = $request->active;

        $users = DB::insert("insert into User (username, password, role, active) values (?, ?, ?, ?)", [$username, $password, $role, $active]);

        return response()->json([
            'message' => 'Malumotlar yaratildi ...'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::select("select * from User where id = '$id'");

        return response()->json([
            'users' => UserResource::collection($users),
            'message' => 'Malumot olindi ...'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $username = $request->username;
        $password = $request->password;
        $role = $request->role;
        $active = $request->active;

        $users = DB::update("update User set username = '$username', password = '$password', role = '$role', active = '$active'");

        return response()->json([
            'message' => 'Malumotlar yangilandi ...'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = DB::delete("delete from User where id = '$id'");

        return response()->json([
            'message' => 'Malumotlar ochirildi ...'
        ]);
    }
}
