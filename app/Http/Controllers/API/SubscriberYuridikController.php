<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberYuridikResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriberYuridikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syuridik = DB::select("select * from subscriber_yuridik");
        
        return response()->json([
            'syuridik' => SubscriberYuridikResource::collection($syuridik),
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
        $pic = $request->pic;
        $tel_number = $request->tel_number;
        $email = $request->email;
        $user_id = $request->user_id;

        $syuridik = DB::insert("insert into subscriber_yuridik (name, pic, tel_number, email, user_id) values (?, ?, ?, ?, ?)", [$name, $pic, $tel_number, $email, $user_id]);

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
        $syuridik = DB::select("select * from subscriber_yuridik where id = '$id'");

        return response()->json([
            'syuridik' => SubscriberYuridikResource::collection($syuridik),
            'message' => 'Malumot olindi'
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
        $name = $request->firstname;
        $pic = $request->pic;
        $tel_number = $request->tel_number;
        $email = $request->email;
        $user_id = $request->user_id;

        $syuridik = DB::update("update subscriber_yuridik set name = '$name', pic = '$pic', tel_number = '$tel_number', email = '$email', user_id = '$user_id' where id = '$id'");

        return response()->json([
            'message' => 'Malumot yangilandi ...'
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
        $syuridik = DB::delete("delete from subscriber_yuridik where id = '$id'");

        return response()->json([
            'message' => 'Malumot ochirildi ...'
        ]);
    }
}
