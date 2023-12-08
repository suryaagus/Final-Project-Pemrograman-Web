@extends('layouts.app')

@section('content')


    <div class="container">
        @if (\Session::has('save'))
            <div class="alert alert-success">
                <p>{{ \Session::get('save') }}</p>
            </div>
        @endif
    </div>

    <div class="container">
        @if (\Session::has('apply'))
            <div class="alert alert-success">
                <p>{{ \Session::get('apply') }}</p>
            </div>
        @endif
    </div>

    <div class="container">
        @if (\Session::has('applied'))
            <div class="alert alert-success">
                <p>{{ \Session::get('applied') }}</p>
            </div>
        @endif
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>{{ $job->job_title }}</h2>
                            <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2">Perusahaan: </span><span class="text-primary">{{ $job->company}}</span>
                            <span class="m-2"><br><span class="icon-room mr-2">Tempat Pekerjaan : </span><span class="text-primary">{{ $job->job_region}}</span>
                            <span class="m-2"><br><span class="icon-clock-o mr-2">Tipe Pekerjaan : </span><span class="text-primary">{{ $job->job_type }}</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <p>{{ $job->jobdescription }}</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary">Responsibilities</h3>
                        <p>{{ $job->responsibilities }}</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary">Education + Experience</h3>
                        <p>{{ $job->education_experience }}</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary">Other Benefits</h3>
                        <p>{{ $job->otherbenefits }}</p>
                    </div>

                    <div class="row mb-5">
                        <div class="col-6">
                            @if(isset(Auth::user()->id))
                            <form action="{{ route('save.job') }}" method="POST">
                                @csrf
                                <input name="job_id" type="hidden" value="{{ $job->id }}">
                                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <input name="job_image" type="hidden" value="{{ $job->image }}">
                                <input name="job_title" type="hidden" value="{{ $job->job_title }}">
                                <input name="job_region" type="hidden" value="{{ $job->job_region }}">
                                <input name="job_type" type="hidden" value="{{ $job->job_type }}">
                                <input name="company" type="hidden" value="{{ $job->company }}">
                                @if ($savedJob > 0)
                                    <button class="btn btn-block btn-success btn-md w-100" disabled>You saved this job</button>
                                @else
                                    <button name="submit" type="submit" class="btn btn-block btn-light btn-md w-100"><i class="icon-heart"></i>Save Job</button>
                                @endif
                            </form>
                            @endif
                        </div>
                        <div class="col-6">
                            <form action="{{ route('apply.job') }}" method="POST">
                                @csrf
                                <input name="job_id" type="hidden" value="{{ $job->id }}">
                                <input name="job_image" type="hidden" value="{{ $job->image }}">
                                <input name="job_title" type="hidden" value="{{ $job->job_title }}">
                                <input name="job_region" type="hidden" value="{{ $job->job_region }}">
                                <input name="job_type" type="hidden" value="{{ $job->job_type }}">
                                <input name="company" type="hidden" value="{{ $job->company }}">
                                @if(isset(Auth::user()->id))
                                    @if ($appliedJob > 0)
                                        <button class="btn btn-block btn-primary btn-md w-100" disabled>You Applied for this Job</button>
                                        
                                        @else
                                        <button type="submit" name="submit" class="btn btn-block btn-primary btn-md w-100">Apply Now</button>
                                        
                                        @endif
                                @else    
                                        <a class="btn btn-block btn-primary btn-md w-100" href="{{ route('login') }}">Login to apply for this Job</a>
                                    @endif
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary mt-3 h5 pl-3 mb-3">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text--black">Published on : {{ $job->created_at }}</strong></li>
                            <li class="mb-2"><strong class="text--black">Vacancy : </strong>{{ $job->vacancy }}</li>
                            <li class="mb-2"><strong class="text--black">Employment Status : </strong>{{ $job->job_type }}</li>
                            <li class="mb-2"><strong class="text--black">Experience : </strong>{{ $job->experience }}</li>
                            <li class="mb-2"><strong class="text--black">Job Location : </strong>{{ $job->job_region }}</li>
                            <li class="mb-2"><strong class="text--black">Salary : </strong>Rp. {{ $job->salary }}</li>
                            <li class="mb-2"><strong class="text--black">Gender : </strong>{{ $job->gender }}</li>
                            <li class="mb-2"><strong class="text--black">Application Deadline : </strong>{{ $job->application_deadline }}</li>
                        </ul>
                    </div>

                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary mt-3 h5 pl-3 mb-3">Categories</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            @foreach ($categories as $category)
                            <li class="mb-2"><a class="text-decoration-none" href="{{ route('categories.single', $category->name) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="next">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Ada {{ $totalRelatedJobs }} pekerjaan yang sama</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach ($relatedJobs as $relatedJob)
                    
                
                <li class="job-listings d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    
                    <div class="job-listings-logo">
                        <img src="{{ $relatedJob->image }}" alt="">
                    </div>

                    <div class="job-listings-about d-sm-flex custom-width w-100 justify-content-center">
                        <div class="job-listings-position custom-width w-50 mb-3 mb-sm-0">
                            <a href="{{ route('single.job', $relatedJob->id) }}"><h2>{{ $relatedJob->job_title }}</h2></a>
                            <strong>{{ $relatedJob->job_company }}</strong>
                        </div>
                        <div class="job-listings-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span>{{ $relatedJob->job_region }}
                        </div>
                        <div class="job-listing-meta bg-warning">
                            <span class="badge">{{ $relatedJob->job_type }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection