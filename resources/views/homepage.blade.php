@extends('layout.template')

@section('title', 'Homepage')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Data Kepegawaian</h1>
<div class="row">
    @foreach ($employees as $employee)
    <div class="col-lg-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $employee['nama'] }}</h5>
                        <p class="card-text">{{ $employee['nip'] }}</p>
                        <a href="/employee/{{ $employee['id'] }}" class="btn btn-dark">Lihat Selanjutnya</a>
                    </div>
                </div>
                <div class="col-md-4">
                <img src="/images/{{ $employee['foto_sampul'] }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $employees->links('vendor.pagination.bootstrap-4') }}
        <style>
            .pagination {
                display: flex;
                justify-content: center;
                list-style: none;
                padding: 0;
                margin: 20px 0;
            }

            .pagination li {
                display: inline-block;
                margin-right: 5px;
            }

            .pagination li a,
            .pagination li span {
                display: inline-block;
                padding: 5px 10px;
                border: 1px solid #ccc;
                text-decoration: none;
                color: #333;
                font-size: 14px; /* Adjust font size as needed */
            }

            .pagination .active span {
                background-color: #007BFF;
                color: #fff;
                border-color: #007BFF;
            }
        </style>
    </div>
</div>
@endsection
