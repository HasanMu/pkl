<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil ditampilkan'
        ];

        return response()->json($response, 200);
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
        $data = new Category;

        $data->nama = $request->nama;
        $data->slug = str_slug($request->nama);
        $data->save();

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil ditambah!'
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::findOrFail($id);

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil ditampilkan'
        ];

        return response()->json($response, 200);
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
        $data = Category::findOrFail($id);

        $data->nama = $request->nama;
        $data->slug = str_slug($request->nama);
        $data->save();

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil diupdate!'
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id)->delete();

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil dihapus'
        ];

        return response()->json($response, 200);
    }
}
