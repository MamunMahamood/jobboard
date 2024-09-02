<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Applydetail;

class ApplydetailController extends Controller
{
    public function detail(){
        return view('applydetail.apply_detail');
    }




    public function detail_store(Request $request)
    {


        $file = '';

        $filepdf = '';


        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension();
            // Move the uploaded file to the public/assets/img directory
            $request->photo->move(public_path('/assets/img'), $filename);
            // Store the relative file path
            $file = '/assets/img/' . $filename;
        }


        if ($request->hasFile('cv')) {
            $filename = time() . '.' . $request->cv->extension();
            // Move the uploaded file to the public/assets/img directory
            $request->cv->move(public_path('/assets/pdfs'), $filename);
            // Store the relative file path
            $filepdf = '/assets/pdfs/' . $filename;
        }







        // Validate the incoming request
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            
            'career_objective' => 'required|string',
            
            
            

        ]);

        // Create a new Job record
        $apply_detail = Applydetail::create([
            'job_title' => $validatedData['job_title'],
           
            'career_objective' => $validatedData['career_objective'],

            'user_id' => Auth::user()->id,
           
            'photo' => $file,
            'cv' => $filepdf,
           
            
        ]);

        // Redirect or return a response (e.g., redirect back to the job list with a success message)
        return redirect()->route('dashboard')->with('success', 'Job created successfully!');
    }
}
