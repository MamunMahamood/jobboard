<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ajob;
use App\Models\Applydetail;
use App\Models\Category;
use App\Models\Reply;


class AjobController extends Controller
{
    public function save(Request $request){
        $user = User::find($request->user_id);
        $user->ajobs()->attach($request->ajob_id);
        $job_id = $request->ajob_id;
        return redirect()->back()->with('success', 'Job created successfully!');


        
    }

    public function apply_job(Request $request){
        $job = Ajob::find($request->ajob_id);
        $job->applydetails()->attach($request->applydetail_id);
        // $job_id = $request->ajob_id;
        return redirect()->back()->with('success', 'Job created successfully!');


        
    }


    public function create(){
        $categories = Category::all();
        return view('ajob.create', compact('categories'));
    }


    public function store(Request $request)
    {


        $file = '';

        if ($request->hasFile('jobimg')) {
            $filename = time() . '.' . $request->jobimg->extension();
            // Move the uploaded file to the public/assets/img directory
            $request->jobimg->move(public_path('/assets/img'), $filename);
            // Store the relative file path
            $file = '/assets/img/' . $filename;
        }







        // Validate the incoming request
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'vacancy' => 'required|integer',
            'experience' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'gender' => 'required|string|max:10', // Adjust validation based on your requirements
            'application_deadline' => 'required|date',
            'job_description' => 'required|string',
            'responsibilities' => 'required|string',
            'education_experience' => 'required|string',
            'other_benefits' => 'nullable|string',
            'employment_status' => 'required|string|max:255',
            'job_location' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            
            

        ]);

        // Create a new Job record
        $job = Ajob::create([
            'job_title' => $validatedData['job_title'],
            'region' => $validatedData['region'],
            'vacancy' => $validatedData['vacancy'],
            'experience' => $validatedData['experience'],
            'salary' => $validatedData['salary'],
            'gender' => $validatedData['gender'],
            'application_deadline' => $validatedData['application_deadline'],
            'job_description' => $validatedData['job_description'],
            'responsibilities' => $validatedData['responsibilities'],
            'education_experience' => $validatedData['education_experience'],
            'other_benefits' => $validatedData['other_benefits'],
            'jobimg' => $file,
            'employment_status' => $validatedData['employment_status'],
            'job_location' => $validatedData['job_location'],
            'company_name' => $validatedData['company_name'],
            'provided_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            
        ]);

        // Redirect or return a response (e.g., redirect back to the job list with a success message)
        return redirect()->route('home.home')->with('success', 'Job created successfully!');
    }




    public function show($id){

        

        $job = Ajob::findOrFail($id);
         $job->incrementViews();

        $related_jobs = Ajob::where('category_id', $job->category_id)->get();
        $total_related_jobs = $related_jobs->count();
        $apply_details = Applydetail::all();
        $replies = Reply::all();
        if (Auth::check()) {
        $apply_detail = Applydetail::where('user_id', Auth::user()->id)->first();
        
        return view('ajob.show', compact('job', 'apply_detail', 'related_jobs', 'total_related_jobs', 'apply_details', 'replies'));
        }
        
        return view('ajob.show', compact('job', 'apply_details', 'replies'));
    }


    public function job_section(){
        return view('ajob.job-section');
    }

    public function saved_jobs(){
        $total_user_jobs = Auth::user()->ajobs()->count(); // Fetch total records count
        $all_user_jobs = Auth::user()->ajobs()->get();     // Fetch all records
        // $apply_detail = Applydetail::where('user_id', Auth::user()->id)->first();

    return view('ajob.saved-jobs', [
        'total_user_jobs' => $total_user_jobs,
        'all_user_jobs' => $all_user_jobs,
        // 'apply_detail' => $apply_detail,
    ]);
    }

    public function applied_jobs(){

        $applydetail = Applydetail::where('user_id', Auth::user()->id)->first();
        
        return view('ajob.applied-jobs', [
            'total_applied_jobs' => $applydetail->ajobs()->count(),
            'all_applied_jobs' => $applydetail->ajobs()->get(),
            // 'apply_detail' => $apply_detail,
        ]);
    }

    public function provided_jobs(){
        $provided_jobs = Ajob::where('provided_id', Auth::user()->id );
        return view('ajob.provided-jobs',[
            'total_provided_jobs' => $provided_jobs->count(),
            'all_provided_jobs' => $provided_jobs->get(),
            // 'apply_detail' => $apply_detail,
        ]);
    }



    public function candidate_list($id){
        $job = Ajob::findOrFail($id);
        return view('ajob.candidates',[
            'total_candidate_list' => $job->applydetails()->count(),
            'all_candidate_list' => $job->applydetails()->get(),
            'job' => $job,
            // 'apply_detail' => $apply_detail,
        ]);

    }


    public function candidate_profile($id){
        $candidate = User::findOrFail($id);
        $apply_detail = Applydetail::where('user_id', $id)->first();
        return view('ajob.candidate',[
            'candidate' => $candidate,
            'apply_candidate' => $apply_detail,
            
            // 'apply_detail' => $apply_detail,
        ]);

    }



    public function create_cat(){
        return view('ajob.new-cat');
    }


    public function store_cat(Request $request){

        $category = Category::create([
            'name' => $request->name,
        ]);
        return view('ajob.show-cat');
    }




    public function store_comment( Request $request){
        $job = Ajob::findorfail($request->ajob_id);

        $job->userComments()->attach($request->user_id, ['comment' => $request->comment]);


        return redirect()->back()->with('success', 'Job created successfully!');
        

    }

    public function store_reply( Request $request){
       

        $user = Reply::create([
            'comment_id' => $request->comment_id,
            'reply' => $request->reply,
            'user_id' => $request->user_id,
        ]);


        return redirect()->back()->with('success', 'Job created successfully!');
        

    }
}
