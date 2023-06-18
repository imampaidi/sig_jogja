<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if(strlen($keyword)){
            $data = Wisata::where('nama', 'like', "%$keyword%")->paginate(5);
        } else {
            // $data = mahasiswa::orderBy('nim', 'desc')->get();    
            $data = Wisata::orderBy('created_at')->paginate(5); 
        }
        return view('dashboard.wisata.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('deskripsi', $request->deskripsi);
        Session::flash('foto', $request->deskripsi);
        Session::flash('alamat', $request->alamat);
        Session::flash('harga_tiket', $request->harga_tiket);
        Session::flash('latitude', $request->latitude);
        Session::flash('longitude', $request->longitude);

        $request->validate([
            'nama'=>'required',
            'deskripsi'=>'required',
            'foto'=>'mimes:jpeg,jpg,png,gif',
            'alamat'=>'required',
            'harga_tiket'=>'required|numeric',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'alamat'=>$request->alamat,
            'harga_tiket'=>$request->harga_tiket,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'foto'=> $foto_nama
        ];
        
        Wisata::create($data);
        return redirect()->to('dashboard/wisata')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Wisata::where('id', $id)->first();
        return view('dashboard.wisata.edit')->with('data', $data);
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

        $request->validate([
            'nama'=>'required',
            'deskripsi'=>'required',
            'foto'=>'nullable',
            'alamat'=>'required',
            'harga_tiket'=>'required|numeric',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);

        $data = [
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'alamat'=>$request->alamat,
            'harga_tiket'=>$request->harga_tiket,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude
        ];

        if($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama); // Sudah Upload ke direktori

            $data_foto = Wisata::where('id', $id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data['foto'] = $foto_nama;
            
        } else {
            unset($data['foto']);
        }
        Wisata::where('id', $id)->update($data);
        return redirect()->to('dashboard/wisata')->with('success', 'Berhasil update data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wisata:: where('id', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        Wisata::where('id', $id)->delete();
        return redirect()->to('dashboard/wisata')->with('success', 'Berhasil delete data!');
    }
}
