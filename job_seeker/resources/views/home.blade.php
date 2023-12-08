@extends('layouts.app')

@section('content')
    <section class="home-section section-hero overlay bg-white pb-5 pt-5" style="margin-top: -24px ">
        <div class="pb-5 pt-5" >
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-5 text-center">
                            <h1 class="text-black font-weight-bold">TEMUKAN PEKERJAAN YANG COCOK DENGANMU</h1>
                            <p>Solusi untuk kamu yang sedang mencari pekerjaan!</p>
                        </div>
                        <form action="{{ route('search.job') }}" method="post" class="search-jobs-form">
                            @csrf
                            <div class="row mb-5 flex-row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <input name="job_title" type="text" class="form-control form-control-lg"
                                        placeholder="Job title or Company....">
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <select name="job_region" class="form-control selectpicker"
                                        data-style="btn-white btn-lg" data-width="100%" data-live-search="true"
                                        title="Select Job Region">
                                        <option value="Anywhere">Anywhere</option>
                                        <option value="Makassar">Makassar</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Bandung">Bandung</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <select name="job_type" class="form-control selectpicker" data-style="btn-white btn-lg"
                                        data-width="100%" data-live-search="true" title="Select Job Type">
                                        <option value="">Part Time</option>
                                        <option value="">Full Time</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <button name="submit" type="submit"
                                        class="btn btn-primary btn-lg btn-block text-white btn-search">
                                        <span class="icon-search icon mr-2">Search Job</span>
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="new-registration-page " style="background-color:#f8fafc">
        <div class="container ">
            <div class="text-center mb-5 ">
                <h1>Ada {{ $totaljobs }} pekerjaan yang sedang menunggu kamu!</h1>
                <h5>Tentukan pilihan anda</h5>
            </div>
            @foreach ($jobs as $job)
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <div class="job-listing-logo">
                        <img src="" alt="" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">

                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2><a href="{{ route('single.job', $job->id) }}" class="">{{ $job->job_title }}</a></h2>
                            <strong>{{ $job->company }}</strong>
                        </div>
                    </div>

                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                        <span class="icon-room"></span> {{ $job->job_region }}
                    </div>

                    <div class="job-listing-meta bg-success">
                        <span class="badge">{{ $job->job_type }}</span>
                    </div>
                </li>
            @endforeach
        </div>

        
        <div class="job-stats-footer pb-5 pt-5 text-center bg-white pb-5 pt-5">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-muted mb-3">Our website stats</h2>
                        <p class="text-muted mb-4">Here the stats of how many people we've helped them to find jobs, hired
                            talents</p>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <h3>15M</h3>
                        <h5>Job Applicants</h5>
                    </div>

                    <div class="col-md-3">
                        <h3>12M</h3>
                        <h5>Job Posted</h5>
                    </div>
                    <div class="col-md-3">
                        <h3>8M</h3>
                        <h5>Employers</h5>
                    </div>
                    <div class="col-md-3">
                        <h3>15M</h3>
                        <h5>Recruiters</h5>
                    </div>
                </div>
            </div>
        </div>
    @endsection




