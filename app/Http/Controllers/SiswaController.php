<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();

        $response = [
            'success'   => true,
            'data'      => $data,
            'message'   => 'Berhasil Ditampilkan'
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
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->umur = $request->umur;
        $siswa->bio = $request->bio;
        $siswa->status = $request->status;
        $siswa->save();

        $response = [
            'success'   => true,
            'data'      => $siswa,
            'message'   => 'Data berhasil disimpan'
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
        $data = Siswa::findOrFail($id);

        $response = [
            'success'   => true,
            'data'      => $data,
            'message'   => 'Berhasil Ditampilkan'
        ];

        return response()->json($response, 200);
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
        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->umur = $request->umur;
        $siswa->bio = $request->bio;
        $siswa->status = $request->status;
        $siswa->save();

        $response = [
            'success'   => true,
            'data'      => $siswa,
            'message'   => 'Data berhasil diupdate'
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
        $data = Siswa::findOrFail($id);
        $data->delete();

        $response = [
            'success'   => true,
            'data'      => $data,
            'message'   => 'Berhasil Dihapus'
        ];

        return response()->json($response, 200);
    }
}
