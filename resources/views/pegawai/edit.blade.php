@extends('layouts.masterCRUD')
@section('title', 'Toko Elektronik')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Edit Pegawai</h4>
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
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label>Kode Pegawai <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="id" id="id" value="{{$data->id}}"/>
                </div>
                <div class="form-group">
                    <label>Nama Pegawai <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama" id="nama" value="{{$data->nama}}"/>
                </div>
                <div class="form-group">
                    <label>Alamat <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="alamat" id="alamat" value="{{$data->alamat}}"/>
                </div>
                <div class="form-group">
                    <label>Nomor Telpon <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="telpon" id="telpon" value="{{$data->telpon}}"/>
                </div>
                <div class="form-group">
                    <label>Kewarganegaraan <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kewarganegaraan" id="kewarganegaraan" value="{{$data->kewarganegaraan}}"/>
                </div>
                <div class="form-group">
                    <label>Pendidikan <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="pendidikan" id="pendidikan" value="{{$data->pendidikan}}"/>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/tampil-pegawai" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
