@extends('layout.template')

@section('title', 'Data Employee')

@section('content')

<h1>Data Master Employee</h1>
<a href="/employees/create" class="btn btn-danger">Input New Employee</a>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori</th>
        <th scope="col">NIP</th>
        <th scope="col">TTL</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Pendidikan</th>
        <th scope="col">Prestasi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $employee->nama }}</td>
            <td>{{ $employee->category->nama_kategori }}</td>
            <td>{{ $employee->nip }}</td>
            <td>{{ $employee->ttl }}</td>
            <td>{{ $employee->jabatan }}</td>
            <td>{{ $employee->pendidikan }}</td>
            <td>{{ $employee->prestasi }}</td>
            <td class="text-nowrap">
                <a href="/employee/{{ $employee['id'] }}/edit" class="btn btn-warning">Edit</a>
                <a href="/employee/delete/{{ $employee->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    <div class="d-flex justify-content-center">
        {{ $employees->links() }}
    </div>
@endsection
