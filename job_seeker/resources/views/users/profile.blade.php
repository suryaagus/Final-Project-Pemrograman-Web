@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image" id="home-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card p-3 py-4">
                        <div class="container">
                            @if (\Session::has('update'))
                                <div class="alert alert-success">
                                    <p>{{ \Session::get('update') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('assets/images_users/'.$profile->image.'') }}" alt="" width="100" class="rounded-circle">
                        </div>

                        <div class="text-center mt-3">
                            <h5>{{ $profile -> name }}</h5>
                            <span>{{ $profile -> job_title }}</span><br>
                            <a href="{{ asset('assets/cvs/'.$profile->cv.'') }}" class="btn btn-success btn-block text-white w-100">Download CV</a>
                            <div class="px-4 mt-1">
                                <p class="fonts">{{ $profile -> bio }}</p>
                            </div>

                            <div class="px-3">
                                <a href="{{ $profile -> facebook }}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                                <a href="{{ $profile -> instagram }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-instagram"></span></a>
                                <a href="{{ $profile -> linkedin }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
