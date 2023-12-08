@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-body">
                
                <h5 class="card-title mb-4 d-inline">Applications</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $applications as $application)
                        <tr>
                            <th scope="row">{{ $application->id }}</th>
                            <td>{{ $application->job_title }}</td>
                            <td>{{ $application->company }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection