@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Jobs</h5>
                    <form action="{{ route('store.jobs') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline  mb-4 mt-4">
                            <label for="job-title">Nama Pekerjaan</label>
                            <input type="text" name="job_title" id="form1Example" class="form-control" placeholder="job_title">
                        </div>
                        @if($errors->has('job_title'))
                        <p class="alert alert-danger">{{ $errors->first('job_title')  }}</p>
                        @endif
                        
                        <div class="form-outline  mb-4">
                            <label for="job-region">Lokasi Pekerjaan</label>
                            <select name="job_region" class="form-select form-control" id="job-region">
                                <option value="Anywhere">Anywhere</option>
                                <option value="Makassar">Makassar</option>
                                <option value="Gowa">Gowa</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                        </div>
                        @if($errors->has('job_region'))
                        <p class="alert alert-danger">{{ $errors->first('job_region')  }}</p>
                        @endif
                        
                        <div class="form-outline mb-4">
                            <label for="company">Perusahaan</label>
                            <input type="text" name="company" id="form1Example" class="form-control" placeholder="Company">
                        </div>
                        @if($errors->has('company'))
                        <p class="alert alert-danger">{{ $errors->first('company')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="job-type">Tipe Pekerjaan</label>
                            <select name="job_type" class="form-select form-control" id="job-type">
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                            </select>
                        </div>
                        @if($errors->has('job_type'))
                        <p class="alert alert-danger">{{ $errors->first('job_type')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="vacancy">Jumlah Orang yang Dibutuhkan</label>
                            <input type="text" name="vacancy" id="form1Example" class="form-control" placeholder="vacancy">
                        </div>
                        @if($errors->has('vacancy'))
                        <p class="alert alert-danger">{{ $errors->first('vacancy')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="experience">Pengalaman</label>
                            <select name="experience" class="form-select form-control" id="experience">
                                <option value="1-2 years">1-2 years</option>
                                <option value="3-4 years">3-4 years</option>
                                <option value="5-6 years">5-6 years</option>
                            </select>
                        </div>
                        @if($errors->has('experience'))
                        <p class="alert alert-danger">{{ $errors->first('experience')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="salary">Gaji</label>
                            <select name="salary" class="form-select form-control" id="salary">
                                <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                <option value="Rp. 2.000.000 - Rp. 2.000.000">Rp. 3.000.000 - Rp. 5.000.000</option>
                                <option value="Rp. 3.000.000 - Rp. 2.000.000">Rp. 6.000.000 - Rp. 8.000.000</option>
                            </select>
                        </div>
                        @if($errors->has('salary'))
                        <p class="alert alert-danger">{{ $errors->first('salary')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-select form-control" id="salary">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Any">Any</option>
                            </select>
                        </div>
                        @if($errors->has('gender'))
                        <p class="alert alert-danger">{{ $errors->first('gender')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="application_deadline">Deadline Waktu Apply</label>
                            <input type="text" name="application_deadline" id="form1Example" class="form-control" placeholder="application_deadline">
                        </div>
                        @if($errors->has('application_deadline'))
                        <p class="alert alert-danger">{{ $errors->first('application_deadline')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="jobdescription">Deskripsi Pekerjaan</label>
                            <textarea name="jobdescription" id="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        @if($errors->has('jobdescription'))
                        <p class="alert alert-danger">{{ $errors->first('jobdescription')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="responsibilities" class="text-black">Ketentuan</label>
                            <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        @if($errors->has('responsibilities'))
                        <p class="alert alert-danger">{{ $errors->first('responsibilities')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="education_experience" class="text-black">Pengalaman Pekerjaan & Pendidikan</label>
                            <textarea name="education_experience" id="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        @if($errors->has('education_experience'))
                        <p class="alert alert-danger">{{ $errors->first('education_experience')  }}</p>
                        @endif
                        
                        <div class="form-outline  mb-4 mt-4">
                            <label for="otherbenefits" class="text-black">Manfaat Lainnya</label>
                            <textarea name="otherbenefits" id="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        @if($errors->has('otherbenefits'))
                        <p class="alert alert-danger">{{ $errors->first('otherbenefits')  }}</p>
                        @endif

                        <div class="form-outline  mb-4 mt-4">
                            <label for="category">Category</label>
                            <select name="category" class="form-select form-control" id="salary">
                                @foreach ($categories as $category)
                                    <option value="{{ $category -> name }}">{{ $category -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('category'))
                        <p class="alert alert-danger">{{ $errors->first('category')  }}</p>
                        @endif

                        
                        {{-- <div class="form-outline  mb-4 mt-4">
                            <label for="image">Images</label>
                            <input type="file" name="image" id="form1Example" class="form-control">
                        </div>
                        @if($errors->has('image'))
                        <p class="alert alert-danger">{{ $errors->first('image')  }}</p>
                        @endif --}}
                        
                        <div class="col-lg-4 ml-auto">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection