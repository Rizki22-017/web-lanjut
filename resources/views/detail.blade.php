@extends('layout.template')

@section('title', $employee['nama'])

@section('content')

<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-9">
        <div class="card-body">
          <h2 class="card-title">{{ $employee['nama'] }}</h2>
          <p class="card-text">{{ $employee['nip'] }}</p>
          <p class="card-text">Kategori : {{ $employee->category->nama_kategori }}</p>
          <p class="card-text">Tempat/Tanggal Lahir : {{ $employee['ttl'] }}</p>
          <p class="card-text">Jabatan : {{ $employee['jabatan'] }}</p>
          <p class="card-text">Pendidikan : {{ $employee['pendidikan'] }}</p>
          <p class="card-text">Prestasi : {{ $employee['prestasi'] }}</p>
          <a href="/" class="btn btn-danger">Kembali</a>
        </div>
      </div>
      <div class="col-md-3">
        <img src="/images/{{ $employee['foto_sampul'] }}" class="img-fluid rounded-end" alt="...">
      </div>
    </div>
  </div>

@endsection
