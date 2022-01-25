<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = DB::select("select * from Employes");

        return response()->json([
            'employes' => EmployesResource::collection($employes),
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
        $name = $request->name;
        $user_id = $request->user_id;
        $organization_id = $request->organization_id;

        $employes = DB::insert("insert into Employes (name, user_id, organization_id) values (?, ?, ?)", [$name, $user_id, $organization_id]);

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
        $employes = DB::select("select * from Employes where id = '$id'");

        return response()->json([
            'employes' => EmployesResource::collection($employes),
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
        $name = $request->name;
        $user_id = $request->user_id;
        $organization_id = $request->organization_id;

        $employes = DB::update("update Employes set name = '$name', user_id = '$user_id', organization_id = '$organization_id' where id = '$id'");

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
        $employes = DB::delete("delete from Employes where id='$id'");

        return response()->json([
            'message' => 'Malumotlar ochirildi ...'
        ]);
    }
}
