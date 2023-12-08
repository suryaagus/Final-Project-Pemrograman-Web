@extends('layouts.admin')

@section('content')

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jobs</h5>
                    <p class="card-text">Jumlah Pekerjaan : {{  $jobs }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text">Jumlah Kategori : {{ $categories }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text">Jumlah Admin : {{ $admins }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Applications</h5>
                    <p class="card-text">Jumlah Pekerjaan yang telah di-Apply : {{ $applications }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection