<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job\Job;
use App\Models\Job\Search;
use App\Models\Job\JobSaved;
use Illuminate\Http\Request;
use App\Models\Job\Application;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function single($id)
    {
        $job = Job::find($id);

        $relatedJobs = Job::where('category', $job->category)
            ->where('id', '!=', $id)
            ->take(5)->get();

        $totalRelatedJobs = Job::where('category', $job->category)
            ->where('id', '!=', $id)
            ->take(5)->count();

        $categories = Category::all();
            
            if (auth()->user()) {
                $savedJob = JobSaved::where('job_id', $id)->where('user_id', Auth::user()->id)->count();
                $appliedJob = Application::where('user_id', Auth::user()->id)->where('job_id', $id)->count();
            # code...
                return view('jobs.single', compact('job', 'relatedJobs', 'totalRelatedJobs', 'savedJob', 'appliedJob', 'categories'));
            } else{
                return view('jobs.single', compact('job', 'relatedJobs', 'totalRelatedJobs', 'categories'));

            }





    }

    public function saveJob(Request $request)
    {
        $saveJob = JobSaved::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'job_image' => $request->job_image,
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'company' => $request->company
        ]);

        if ($saveJob) {
            return redirect('/jobs/single/' . $request->job_id . '')->with('save', 'job saved successfully');
        }
    }

    public function jobApply(Request $request)
    {

        if ($request->cv == 'No cv') {
            return redirect('/jobs/single/' . $request->job_id . '')->with('apply', 'upload your CV first in the profile page');
        } else {
            $applyJob = Application::create([
                'cv' => Auth::user()->cv,
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                'job_title' => $request->job_title,
                'job_region' => $request->job_region,
                'job_type' => $request->job_type,
                'company' => $request->company
            ]);
            if ($applyJob) {
                return redirect('/jobs/single/' . $request->job_id . '')->with('applied', 'you applied to this job successfully');
            }
        }
    }

    public function search(Request $request)
    {
        // Request()->validate([
        //     "job_title" => "required",
        //     "job_region" => "required",
        //     "job_type" => "required",
        // ]); 

        Search::Create([
            "keyword" => $request->get('job_title')
        ]);

        $job_title = $request->get('job_title');
        $job_region = $request->get('job_region');
        $job_type = $request->get('job_type');

        $searchs = Job::select()->where('job_title', 'like', "%$job_title%")
            ->where('job_region', 'like', "%$job_region%")
            ->where('job_type', 'like', "%$job_type%")
            ->get();

        return view('jobs.search', compact('searchs'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}