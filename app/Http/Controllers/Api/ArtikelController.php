<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artikel;
use Auth;
use File;
use App\Tag;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::with('category', 'user', 'tag')->orderBy('created_at', 'desc')->get();
        $count = Artikel::all();

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
        $data = new Artikel;

        $data->judul = $request->judul;
        $data->slug = str_slug($request->judul);
        $data->konten = $request->konten;
        $data->user_id = $request->id;;
        $data->category_id = $request->kategori;
        $data->views = 1;
        # Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path().'/assets/backend/artikel/img/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $upload = $file->move($path, $filename);
            $data->foto = $filename;
        }
        $data->save();
        $data->tag()->attach($request->tag);
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
        $data = Artikel::findOrFail($id);

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil ditampilkan'.$data->judul
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
        $data = Artikel::findOrFail($id);

        $data->judul = $request->judul;
        $data->slug = str_slug($request->judul);
        $data->konten = $request->konten;
        $data->user_id = Auth::user()->id;
        $data->category_id = $request->category;
        # Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path().'/assets/backend/artikel/img/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $upload = $file->move($path, $filename);
            if($data->foto){
                $old_foto = $data->foto;
                $filepath = public_path().'/assets/backend/artikel/img/'.$data->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    //Exception $e;
                }
            }
            $data->foto = $filename;
        }
        $data->save();
        $data->tag()->sync($request->tag);

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil ditambah!'
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
        $data = Artikel::findOrFail($id);
        if($data->foto){
            $old_foto = $data->foto;
            $filepath = public_path().'/assets/backend/artikel/img/'.$data->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                //Exception $e;
            }
        }
        $data->tag()->detach($data->id);
        $data->delete();

        $response = [
            'success'   =>  true,
            'data'      =>  $data,
            'message'   =>  'berhasil dihapus!'
        ];

        return response()->json($response, 200);
    }
}
