@extends('layouts.masterCRUD')
@section('title', 'Pegawai')
@section('content')
<div class="container">
    <br>
    @if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>  
    @endif
    <h2>Tabel Data Pegawai</h2>
    <a href=" {{ route('pegawai.create') }} " class="btn btn-success">+ Tambah Data</a>
    <table class="table table-bordered table-striped bg-light" id="tabel">
        <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th style="width:7%">ID</th>
                <th style="width:12%">Nama Pegawai</th>
                <th style="width:12%">Alamat</th>
                <th style="width:8%">Telpon</th>
                <th style="width:8%">Kewarganegaraan</th>
                <th style="width:8%">Pendidikan</th>
                <th style="width:8%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPegawai as $data)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $data->id }} </td>
                <td>{{ $data->nama }} </td>
                <td>{{ $data->alamat }} </td>
                <td>{{ $data->telpon }} </td>
                <td>{{ $data->kewarganegaraan }} </td>
                <td>{{ $data->pendidikan }} </td>
                <td>
                    <form action="{{ route('pegawai.destroy', $data-> id) }}" method="post">@csrf
                    <a href="{{ route('pegawai.edit', $data-> id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" OnClick="return confirm('Yakin Hapus Data?')">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection