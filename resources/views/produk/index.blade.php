@extends('layouts.masterCRUD')
@section('title', 'Produk')
@section('content')
<div class="container">
    <br>
    @if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>  
    @endif
    <h2>Tabel Data Produk</h2>
    <br>
    <a href=" {{ route('produk.create') }} " class="btn btn-success">+ Tambah Data</a>
    <a href=" {{ route('excel') }}" class="btn btn-primary pull-right">Excel</a>
    <a href=" {{ route('pdfProduk') }}" class="btn btn-secondary pull-right" targer="_blank">PDF</a>
    
    <table class="table table-bordered table-striped bg-light" id="tabel">
        <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th style="width:7%">Kode Produk</th>
                <th style="width:12%">Nama Produk</th>
                <th style="width:12%">Kategori</th>
                <th style="width:12%">Harga</th>
                <th style="width:8%">Stok</th>
                <th style="width:8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataProduk as $data)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $data->id }} </td>
                <td>{{ $data->nama_produk }} </td>
                <td>{{ $data->kategori->nama_kategori }} </td>
                <td>{{ number_format($data->harga, 0, ',' , '.') }} </td>
                <td>{{ $data->stock }} </td>
                <td>
                    <form action=" {{ route('produk.destroy', $data->id) }} " method="post">@csrf
                    <a href=" {{ route('produk.edit', $data->id) }} " class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" OnClick="return confirm('Yakin Hapus Data?')">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection