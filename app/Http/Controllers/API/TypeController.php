<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = DB::select("select * from Type");
        return response()->json([
            'type' => TypeResource::collection($type),
            'message' => 'Malumotlar olindi...'
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
        $type = DB::insert("insert into Type(name) values(?)", [$name]);
        return response()->json([
            'message' => 'Malumot yaratildi...'
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
        $type = DB::select("select * from Type where id='$id'");
        return response()->json([
            'type' => TypeResource::collection($type),
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
        $type = DB::update("update Type set name = '$name' where id='$id'");
        return response()->json([
            'message' => 'Malumot yangilandi...'
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
        $type = DB::delete("delete from Type where id='$id'");
        return response()->json([
            'message' => 'Malumot ochirildi...'
        ]);
    }
}
