@extends('layout.template')
@section('title', 'Input Data Employee')
@section('content')
		<h2 class="mb-4">Edit Employee</h2>
		<form action="/employee/{{ $employee->id }}/edit" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
				<label for="id" class="form-label">ID Employee:</label>
				<input type="text" class="form-control" id="id" name="id" value="{{ $employee->id }}" disabled>
			</div>
			<div class="mb-3">
				<label for="nama" class="form-label">Nama:</label>
				<input type="text" class="form-control" id="nama" name="nama" value="{{ $employee->nama }}" required="">
			</div>
			<div class="mb-3">
				<label for="category_id" class="form-label">Kategori:</label>
				<select name="category_id" id="category_id" class="form-select" required>
					<option value="">Pilih Kategori</option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}" {{ $employee->category_id == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
					@endforeach
				</select>
			</div>
            <div class="mb-3">
				<label for="nip" class="form-label">NIP:</label>
				<input type="number" class="form-control" id="nip" name="nip" value="{{ $employee->nip }}" required="">
			</div>
            <div class="mb-3">
				<label for="ttl" class="form-label">Tempat/Tanggal Lahir:</label>
				<input type="text" class="form-control" id="ttl" name="ttl" value="{{ $employee->ttl }}" required="">
			</div>
            <div class="mb-3">
				<label for="jabatan" class="form-label">Jabatan:</label>
				<input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $employee->jabatan }}" required="">
			</div>
			<div class="mb-3">
				<label for="pendidikan" class="form-label">Pendidikan:</label>
				<textarea class="form-control" id="pendidikan" name="pendidikan" rows="4" required="">{{ $employee->pendidikan }}</textarea>
			</div>
            <div class="mb-3">
				<label for="prestasi" class="form-label">Prestasi:</label>
				<textarea class="form-control" id="prestasi" name="prestasi" rows="4" required="">{{ $employee->prestasi }}</textarea>
			</div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Sebelumnya:</label>
                <img src="/images/{{ $employee['foto_sampul'] }}" class="img-thumbnail" alt="..." width="100px">
            </div>
			<div class="mb-3">
				<label for="foto_sampul" class="form-label">Foto Sampul:</label>
				<input type="file" class="form-control" id="foto_sampul" name="foto_sampul">
			</div>
			<div class="mb-3">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		@endsection
