<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberFizikResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriberFizikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sfizik = DB::select("select * from subscriber_fizik");
        
        return response()->json([
            'sfizik' => SubscriberFizikResource::collection($sfizik),
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
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $tel_number = $request->tel_number;
        $email = $request->email;
        $user_id = $request->user_id;

        $sfizik = DB::insert("insert into subscriber_fizik (firstname, lastname, tel_number, email, user_id) values (?, ?, ?, ?, ?)", [$firstname, $lastname, $tel_number, $email, $user_id]);

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
        $sfizik = DB::select("select * from subscriber_fizik where id = '$id'");

        return response()->json([
            'sfizik' => SubscriberFizikResource::collection($sfizik),
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
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $tel_number = $request->tel_number;
        $email = $request->email;
        $user_id = $request->user_id;

        $sfizik = DB::update("update subscriber_fizik set firstname = '$firstname', lastname = '$lastname', tel_number = '$tel_number', email = '$email', user_id = '$user_id' where id = '$id'");

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
        $sfizik = DB::delete("delete from subscriber_fizik where id = '$id'");

        return response()->json([
            'message' => 'Malumotlar ochirildi ...'
        ]);
    }
}
