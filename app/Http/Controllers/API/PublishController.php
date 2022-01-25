<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublishResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publish = DB::select("select * from Publish");
        // dd($publish);
        return response()->json([
            'publish' => PublishResource::collection($publish),
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
        $type_id = $request->type_id;
        $publisher_id = $request->publisher_id;
        $rubrika_id = $request->rubrika_id;
        $publish = DB::insert("insert into Publish (name, type_id, publisher_id, rubrika_id) values (?, ?, ?, ?)", [$name, $type_id, $publisher_id, $rubrika_id]);

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
        $publish = DB::select("select * from Publish where id = '$id'");
        return response()->json([
            'publish' => PublishResource::collection('publish')
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
        $type_id = $request->type_id;
        $publisher_id = $request->publisher_id;
        $rubrika_id = $request->rubrika_id;
        $publish = DB::update("update Publish set name = '$name', type_id='$type_id', publisher_id = '$publisher_id', rubrika_id = '$rubrika_id' where id ='$id'");
        return response()->json([
            'message' => 'Malumot yangilandi'
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
        $publish = DB::delete("delete from Publish where id = '$id'");
        return response()->json([
            'message' => 'Malumot ochirildi'
        ]);
    }
}
