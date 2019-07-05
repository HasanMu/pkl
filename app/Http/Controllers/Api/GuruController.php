<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Guru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Guru::all();

        $response = [
            'success'   => true,
            'data'      => $data,
            'message'   => 'Berhasil Ditampilkan'
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new Guru;
        $guru->nama = $request->nama;
        $guru->alamat = $request->alamat;
        $guru->umur = $request->umur;
        $guru->bidang_studi = $request->bidang_studi;
        $guru->status = $request->status;
        $guru->save();

        $response = [
            'success'   => true,
            'data'      => $guru,
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
        $data = Guru::findOrFail($id);

        $response = [
            'success'   => true,
            'data'      => $data,
            'message'   => 'Berhasil Ditampilkan 1 Guru'
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
        $guru = Guru::findOrFail($id);
        $guru->nama = $request->nama;
        $guru->alamat = $request->alamat;
        $guru->umur = $request->umur;
        $guru->bidang_studi = $request->bidang_studi;
        $guru->status = $request->status;
        $guru->save();

        $response = [
            'success'   => true,
            'data'      => $guru,
            'message'   => 'Data berhasil diubah'
        ];

        return response()->json($guru, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Guru::findOrFail($id);
        $data->delete();

        $response = [
            'success'   => true,
            'data'      => $data,
            'message'   => 'Berhasil Dihapus'
        ];

        return response()->json($response, 200);
    }
}
