<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = DB::select("select * from Article");
        return response()->json([
            'article' => ArticleResource::collection($article),
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
        $title = $request->title;
        $author = $request->author;
        $description = $request->description;
        $published_id = $request->published_id;
        $article = DB::insert("insert into Article(title, author, description, published_id) values (?, ?, ?, ?)", [$title, $author, $description, $published_id]);

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
        $article = DB::select("select * from Article where id='$id'");
        return response()->json([
            'article' => ArticleResource::collection($article),
            'message' => 'Malumot olindi...'
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
        $title = $request->title;
        $author = $request->author;
        $description = $request->description;
        $published_id = $request->published_id;

        $article = DB::update("update Article set title='$title', author='$author', description='$description', published_id='$published_id' where id='$id'");
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
        $article = DB::delete("delete from Article where id='$id'");
        return response()->json([
            'message' => 'Malumot ochirildi...'
        ]);
    }
}
