<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\Blog;

class JobController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'Admin') {
            $jobs = Job::all();
        } else {
            $jobs = Job::where('user_id', $user->id)->get();
        }

        $companies = Company::where('user_id', $user->id)->get();

        // Define roles
        $roles = [
            'General Manager (Logistics)',
            'Branch Manager',
            'Director of Logistics',
            'Vice President (Operations)',
            'President (Freight Division)',
            'Pricing Manager (Freight Operations)',
            'IT Manager (Logistics Systems)',
            'Freight Brokerage Sales Executive',
            'Business Development Manager',
            'Strategic Account Manager',
            'Carrier Sales Representative',
            'Freight Solutions Consultant',
            'Fleet Manager',
            'Dispatch Coordinator',
            'Carrier Relationship Manager',
            'Load Planner',
            'Trucking Operations Manager',
            'Route Planner',
            'Freight Broker',
            'Driver Trainer',
            'Maintenance Supervisor',
            'Over-the-Road (OTR) Truck Driver',
            'Regional Truck Driver',
            'Flatbed Truck Driver',
        ];
        return view('jobs.list', compact('jobs', 'companies', 'roles'));
    }


     //
     public function filterJobs(Request $request)
     {
         $query = Job::query();
         
         // Apply filters
         if ($request->has('company_name') && $request->company_name != '') {
             $query->where('company_name', 'like', '%' . $request->company_name . '%');
         }
         
         if ($request->has('city') && $request->city != '') {
             $query->where('city', 'like', '%' . $request->city . '%');
         }
         
         if ($request->has('salary') && $request->salary != '') {
             $salaryRange = explode('-', $request->salary);
             if (count($salaryRange) == 2) {
                 $query->whereBetween('salary', [intval($salaryRange[0]), intval($salaryRange[1])]);
             } elseif (count($salaryRange) == 1) {
                 $query->where('salary', '>=', intval($salaryRange[0]));
             }
         }
         
         if ($request->has('job_type') && $request->job_type != '') {
             $query->where('job_type', $request->job_type);
         }
         
         $jobs = $query->get(); // Get filtered jobs
         
         return view('job', compact('jobs')); // Ensure the correct path to the view file
     }
     
//        
    public function create(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'role' => 'required',
            'city' => 'required',
            'country' => 'required',
            'about_job' => 'required',
            'requirement' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
            'category' => 'required',

        ]);

        // Create a new job
        $job = new Job();
        $job->user_id = Auth::id(); // Set the user ID to the authenticated user
        $job->fill($request->all());

        $job->save();

        return redirect()->back()->with('success', 'Job created successfully!');
    }


    public function delete($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.list')->with('success', 'Job deleted successfully!');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'role' => 'required',
            'city' => 'required',
            'country' => 'required',
            'about_job' => 'required',
            'requirement' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
            'category' => 'required',
        ]);

        $job = Job::findOrFail($id);
        $job->save();

        return redirect()->route('jobs.list')->with('success', 'Job updated successfully!');
    }




    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobdetail', compact('job'));
    }
    public function joblist()
    {
        $jobs = Job::all(); // Fetch all jobs
        return view('job', compact('jobs'));
    }
    public function apply(Request $request, $jobId)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'experience' => 'required',
        ]);
    
        $application = new JobApplication();
        $application->job_id = $jobId;
        $application->user_id = Auth::id(); // Assuming the user is logged in
        $application->first_name = $request->first_name;
        $application->last_name = $request->last_name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->street_address = $request->street_address;
        $application->city = $request->city;
        $application->state = $request->state;
        $application->experience = $request->experience;
    
        if ($request->hasFile('resume')) {
            $application->resume = $request->file('resume')->store('resumes', 'public');
        }
    
        $application->save();
    
        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }
    


    public function indexs()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Check if the authenticated user is an admin
        if ($user && $user->role === 'Admin') {
            // Fetch all job applications for admin users
            $applications = JobApplication::with('job')->get();
        } else {
            // Fetch job applications only for the jobs created by the authenticated user
            $applications = JobApplication::whereHas('job', function ($query) {
                $query->where('user_id', Auth::id());
            })->with('job')->get();
        }

        return view('application.list', compact('applications'));
    }

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->delete();

        return redirect()->back()->with('success', 'Application deleted successfully!');
    }
}
