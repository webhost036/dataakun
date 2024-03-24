@extends('layout/aplikasi')

@section('konten')
    <div>
        <a href='/akun' class="btn btn-secondary"> << Kembali </a>
        <h1>{{ $data->nama }}</h1>
        <p>
            <b>Kode Akun</b> {{ $data->kode_akun}}
        </p>
        <p>
            <b>Nama Akun</b> {{ $data->nama_akun}}
        </p>
        <p>
            <b>Deskripsi</b> {{ $data->deskripsi}}
        </p>
        <p>
            <b>Tipe Akun</b> {{ $data->tipe_akun}}
        </p>
        <p>
            <b>Kategori Akun</b> {{ $data->kategori_akun}}
        </p>
        <p>
            <b>level Akun</b> {{ $data->level_akun}}
        </p>
    </div>

@endsection
