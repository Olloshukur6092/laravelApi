<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RubrikaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RubrikaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubrika = DB::select("select * from Rubrika");
        // dd($rubrika);
        return response()->json([
            'rubrika' => RubrikaResource::collection($rubrika),
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
        $rubrika = DB::insert("insert into Rubrika(name) values (?)", [$name]);
        return response()->json([
            'message' => 'Malumotlar yaratildi...'
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
        $rubrika = DB::select("select * from Rubrika where id='$id'");
        return response()->json([
            'rubrika' => RubrikaResource::collection($rubrika),
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
        $rubrika = DB::update("update Rubrika set name='$name' where id='$id'");
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
        $rubrika = DB::delete("delete from Rubrika where id='$id'");
        return response()->json([
            'message' => 'Malumot ochirildi ...'
        ]);
    }
}
