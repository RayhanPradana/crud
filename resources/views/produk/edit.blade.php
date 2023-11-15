@extends('layouts.masterCRUD')
@section('title', 'Toko Elektronik')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Edit Produk</h4>
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-row-2">
                        <div class="p-3 text-left">
                                    <b>Kategori</b><br>
                                    1.Smarthphone<br>
                                    2.Accesories<br>
                                    3.Notebook<br>
                                    4.Personal Computer
                        </div>
                    </div>
                </div>
            <br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('produk.update', $data->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Kode Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="id" id="id" value="{{$data->id}}"/>
                </div>
                <div class="form-group">
                    <label>Nama Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_produk" id="nama_produk" value="{{$data->nama_produk}}"/>
                </div>
                <div class="form-group">
                    <label>Kategori <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kategori_id" id="kategori_id" value="{{$data->kategori_id}}" />
                </div>
                <div class="form-group">
                    <label>Harga <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="harga" id="harga" value="{{$data->harga}}"/>
                </div>
                <div class="form-group">
                    <label>Stok <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="stock" id="stock" value="{{$data->stock}}"/>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href=" {{ route('produk.store') }} " class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
