@extends('layouts.master')
@section('content')



<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('images/hero_1.jpg') }}');" id="home-section">

      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">{{ $job->job_title }}</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>{{ $job->job_title }}</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="{{ $job->jobimg }}" alt="Image" width="120">
              </div>
              <div>
                <h2>{{ $job->job_title }}</h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{ $job->company_name }}</span>
                  <span class="m-2"><span class="icon-room mr-2"></span>{{ $job->job_location }}</span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{ $job->employment_status }}</span></span>
                </div>
              </div>
            </div>
          </div>




          
    
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <figure class="mb-5"><img src="{{ asset('images/job_single_img_1.jpg') }}" alt="Image" class="img-fluid rounded"></figure>
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
              <p>{{ $job->job_description }}</p>
            </div>
            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
              <p>{{ $job->responsibilities }}</p>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
              <p>{{ $job->education_experience }}</p>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
              <p>{{ $job->other_benefits }}</p>
            </div>


            @php
             $isSaved = Auth::user()->ajobs()->where('ajob_id', $job->id)->exists();
            @endphp

            <div class="row mb-5">
              <div class="col-6">
                 <form action="{{ route('ajob-save') }}" method="POST">
                   @csrf

                   @auth
                   <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                   <input type="hidden" class="form-control" id="ajob_id" name="ajob_id" value="{{ $job->id }}">
                   @else
                   <input type="hidden" class="form-control" id="user_id" name="user_id" value="">
                   <input type="hidden" class="form-control" id="ajob_id" name="ajob_id" value="{{ $job->id }}">
                   @endauth
                   <button name="submit" type="submit"  
                   class="{{ $isSaved ? 'btn btn-block btn-success btn-md' : 'btn btn-block btn-light btn-md' }}" 
                   {{ $isSaved ? 'disabled' : '' }}>
                   <i class="icon-heart"></i> 
                   {{ $isSaved ? 'Job Saved' : 'Save Job' }}
                   </button>


                 </form>
                
                <!--add text-danger to it to make it read-->
              </div>

              @php
              $isApplied = $job->applyDetails()->where('ajob_id', $job->id)->exists();
              
              @endphp

              <div class="col-6">
              <form action="{{ route('apply-job') }}" method="POST">
                   @csrf

                   @auth
                   
                   <input type="hidden" class="form-control" id="ajob_id" name="ajob_id" value="{{ $job->id }}">
                   <input type="hidden" class="form-control" id="applydetail_id" name="applydetail_id" value="{{ $apply_detail->id }}">
                   @else
                   
                   <input type="hidden" class="form-control" id="ajob_id" name="ajob_id" value="{{ $job->id }}">
                   <input type="hidden" class="form-control" id="applydetail_id" name="applydetail_id" value="">
                   @endauth
                   <button name="submit" type="submit"  
                   class="{{ $isApplied ? 'btn btn-block btn-success btn-md' : 'btn btn-block btn-light btn-md' }}" 
                   {{ $isApplied ? 'disabled' : '' }}>
                   <i class="icon-heart"></i> 
                   {{ $isSaved ? 'You Applied' : 'Apply Now' }}
                   </button>


                 </form>
                <!-- <button class="btn btn-block btn-secondary btn-md">Apply Now</button> -->
              </div>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong> {{ $job->created_at }}</li>
                <li class="mb-2"><strong class="text-black">Vacancy:</strong> 20</li>
                <li class="mb-2"><strong class="text-black">Employment Status:</strong> {{ $job->employment_status }}</li>
                <li class="mb-2"><strong class="text-black">Experience:</strong> {{ $job->experience }}</li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong> {{ $job->job_location }}</li>
                <li class="mb-2"><strong class="text-black">Salary:</strong> {{ $job->salary }}</li>
                <li class="mb-2"><strong class="text-black">Gender:</strong> {{ $job->gender }}</li>
                <li class="mb-2"><strong class="text-black">Application Deadline:</strong> {{ $job->app_deadline }}</li>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
              </div>
            </div>

          </div>
        </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </section>





@endsection