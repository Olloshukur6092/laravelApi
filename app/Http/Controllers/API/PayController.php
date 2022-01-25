<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PayResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay = DB::select("select * from Pay");

        return response()->json([
            'pay' => PayResource::collection($pay),
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
        $date = $request->date;
        $summ = $request->summ;
        $pid = $request->publish_subscriber_id;

        $pay = DB::insert("insert into Pay (date, summ, publish_subscriber_id) values (?, ?, ?)", [$date, $summ, $pid]);

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
        $pay = DB::select("select * from Pay where id = '$id'");

        return response()->json([
            'pay' => PayResource::collection($pay),
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
        $date = $request->date;
        $summ = $request->summ;
        $pid = $request->publish_subscriber_id;

        $pay = DB::update("update Pay set date = '$date', summ = '$summ', publish_subscriber_id = '$pid' where id = '$id'");

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
        $pay = DB::delete("delete from Pay where id = '$id'");

        return response()->json([
            'message' => 'Malumot ochirildi ...'
        ]);
    }
}
