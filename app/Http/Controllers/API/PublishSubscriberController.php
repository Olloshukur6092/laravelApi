<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublishSubscriberResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublishSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pSubs = DB::select("select * from PublishSubscriber");

        return response()->json([
            'publishSubscriber' => PublishSubscriberResource::collection($pSubs),
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
        $subscriberFizik_id = $request->subscriberFizik_id;
        $subscriberYuridik_id = $request->subscriberYuridik_id;
        $subscriber_date = $request->subscriber_date;
        $muddati = $request->muddati;
        $summa = $request->summa;
        $ispaid = $request->ispaid;

        $pSubs = DB::insert("insert into PublishSubscriber (publish_id, subscriberFizik_id, subscriberYuridik_id, subscriber_date, muddati, summa, ispaid) values (?, ?, ?, ?, ?, ?, ?)", [$publish_id, $subscriberFizik_id, $subscriberYuridik_id, $subscriber_date, $muddati, $summa, $ispaid]);

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
        $pSubs = DB::select("select * from PublishSubcriber where id = '$id'");

        return response()->json([
            'publishSubscriber' => PublishSubscriberResource::collection($pSubs),
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
        $subscriberFizik_id = $request->subscriberFizik_id;
        $subscriberYuridik_id = $request->subscriberYuridik_id;
        $subscriber_date = $request->subscriber_date;
        $muddati = $request->muddati;
        $summa = $request->summa;
        $ispaid = $request->ispaid;

        $pSubs = DB::update("update PublishSubscriber set publish_id = '$publish_id', subscriberFizik_id = '$subscriberFizik_id', subscriberYuridik_id = '$subscriberYuridik_id', subscriber_date = '$subscriber_date', muddati = '$muddati', summa = '$summa', ispaid = '$ispaid'");

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
        $pSubs = DB::delete("delete from PublishSubscriber where id = '$id'");

        return response()->json([
            'message' => 'Malumotlar ochirildi ...'
        ]);
    }
}
