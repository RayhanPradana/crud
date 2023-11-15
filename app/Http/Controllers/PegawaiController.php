<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index(){
        $data = pegawai::all();
            return view('pegawai.index', ['dataPegawai' => $data]);
    }
    public function create(){
        return view('pegawai.create');
    }
    public function store(Request $request){
        $message= [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|numeric',
            'nama' => 'required|unique:pegawai',
            'alamat' => 'required',
            'telpon' => 'required|numeric',
            'kewarganegaraan' => 'required',
            'pendidikan' => 'required'
        ], $message);

        $data = new pegawai;
        $data->id = $request->id;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->telpon = $request->telpon;
        $data->kewarganegaraan = $request->kewarganegaraan;
        $data->pendidikan = $request->pendidikan;
        $data->save();
        return redirect('/tampil-pegawai')->with('success', 'Data berhasil disimpan');

    }
    public function edit($id){
        $data= pegawai::find($id);
        return view('pegawai.edit', compact('data'));
    }

    Public function update(Request $request, $id){
        $message= [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|numeric',
            'nama' => 'required|unique:pegawai',
            'alamat' => 'required',
            'telpon' => 'required|numeric',
            'kewarganegaraan' => 'required',
            'pendidikan' => 'required'
        ], $message);

        $data = pegawai::find($id);
        $data->id = $request->id;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->telpon = $request->telpon;
        $data->kewarganegaraan = $request->kewarganegaraan;
        $data->pendidikan = $request->pendidikan;
        $data->update();
        return redirect('/tampil-pegawai')->with('success', 'Data berhasil diubah');
    }

    
    public function destroy($id){
        $data = pegawai::find($id);
        $data->delete();
        return redirect('/tampil-pegawai')->with('success', 'Data berhasil dihapus');
    }

}

?>
