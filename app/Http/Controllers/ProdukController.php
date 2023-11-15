<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcelProduk;

class ProdukController extends Controller
{
    public function index(){
        $data = produk::all();
            return view('produk.index', ['dataProduk' => $data]);
    }

    public function create(){
        return view('produk.create');
    }

    public function store(Request $request){
        //validasi
        $message= [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|numeric',
            'nama_produk' => 'required|unique:produk',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric'
        ], $message);

        $data = new produk;
        $data->id = $request->id;
        $data->nama_produk = $request->nama_produk;
        $data->kategori_id = $request->kategori_id;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->save();
        return redirect('/tampil-produk')->with('success', 'Data berhasil disimpan');

    }

    public function edit($id){
        $data = produk::find($id);
        return view('produk.edit', compact('data'));
    }

    Public function update(Request $request, $id){
        $message= [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|numeric',
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric'
        ], $message);

        $data = produk::find($id);
        $data->nama_produk = $request->nama_produk;
        $data->kategori_id = $request->kategori_id;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->update();
        return redirect('/tampil-produk')->with('success', 'Data berhasil diubah');;
    }

    public function destroy($id){
        $data = produk::find($id);
        $data->delete();
        return redirect('/tampil-produk')->with('success', 'Data berhasil dihapus');;
    }

    public function __construct(){
        $this->middleware('admin');
    }

    public function exportExcelProduk(){
        return Excel::download(new ExportExcelProduk, 'Produk.xlsx');
    }

    public function pdfProduk(){
        $data = Produk::all();
            return view('produk.pdfProduk', ['dataProduk' => $data]);
    }

    public function chart(){
        $dataLabel = Produk::orderBy('nama_produk', 'asc')
        ->pluck('nama_produk')->toArray();
        $dataStock = Produk::orderBy('nama_produk', 'asc')
        ->pluck('stock')->toArray();

        return view('produk.chart', compact('dataLabel', 'dataStock'));
    }
}

?>