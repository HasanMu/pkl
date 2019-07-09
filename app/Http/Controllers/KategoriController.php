<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DataTables;

class KategoriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Category::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = ' <button class="edit btn btn-info"><i class="fa fa-edit"></i></button>';
                           $btn = $btn.' <button class="hapus-kategori btn btn-danger popup-hapus" data-toggle="modal" data-target="#delete" data-id="'.$row->id.'" data-nama="'.$row->nama.'"><i class="fa fa-trash-o"></i></button>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

        }

        return view('backend.kategori.index');
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
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
