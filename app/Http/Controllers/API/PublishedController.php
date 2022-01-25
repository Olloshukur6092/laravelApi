<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublishedResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $published = DB::select("select * from Published");
        return response()->json([
            'published' => PublishedResource::collection($published),
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
        $publish_id = $request->publish_id;
        $date = $request->date;
        $tom = $request->tom;
        $number = $request->number;

        $published = DB::insert("insert into Published (publish_id, date, tom, number) values (?, ?, ?, ?)", [$publish_id, $date, $tom, $number]);

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
        $published = DB::select("select * from Published where id = '$id'");

        return response()->json([
            'published' => PublishedResource::collection($published),
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
        $publish_id = $request->publish_id;
        $date = $request->date;
        $tom = $request->tom;
        $number = $request->number;

        $published = DB::update("update Published set publish_id = '$publish_id', date = '$date', tom = '$tom', number = '$number' where id = '$id'");
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
        $published = DB::delete("delete from Published where id = '$id'");

        return response()->json([
            'message' => 'Malumotlar ochirildi ...'
        ]);
    }
}
