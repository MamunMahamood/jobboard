<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ajob;


class AjobController extends Controller
{
    public function save(Request $request){
        $user = User::find($request->user_id);
        $user->ajobs()->attach($request->ajob_id);
        $job_id = $request->ajob_id;
        return redirect()->back()->with('success', 'Job created successfully!');


        
    }


    public function create(){
        return view('ajob.create');
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
            
        ]);

        // Redirect or return a response (e.g., redirect back to the job list with a success message)
        return redirect()->route('home.home')->with('success', 'Job created successfully!');
    }




    public function show($id){

        $job = Ajob::findOrFail($id);
        return view('ajob.show', compact('job'));
    }
}
