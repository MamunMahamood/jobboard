@extends('layouts.master')
@section('content')



<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
            <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                <div class="card p-3 py-4">
                        
                        <div class="text-center">
                            <img src="{{$apply_detail->photo }}" width="100" class="rounded-circle">
                        </div>
                        
                        <div class="text-center mt-3">
                            <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                            <h5 class="mt-2 mb-0">{{ Auth::user()->name }}</h5>
                            <span>{{ $apply_detail->job_title }}</span>
                            
                            <div class="px-4 mt-1">
                                <p class="fonts">{{ $apply_detail->career_objective }} </p>
                            
                            </div>
                            
                            <div class="px-3">
                            <a href="{{ $apply_detail->cv }}" target="_blank">View CV</a>
                        <a href="#" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                        <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                        <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                    </div>
                            
                        
                            
                        </div>
                        
                    
                        
                        
                    </div>
                </div>
            </div>

            
            </div>
        </section>


        <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Saved Jobs - {{$total_user_jobs}}</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
        @foreach($all_user_jobs as $job)
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="{{ route('ajob-show', ['id' => $job->id]) }}"></a>
            <div class="job-listing-logo">
                @if($job->jobimg)
                           
                            <img src="{{ asset( $job->jobimg ) }}" alt="Free Website Template by Free-Template.co"  width="80" class="img-fluid">
                @else
                  No Photo
                @endif
              
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{ $job->job_title }}</h2>
                <strong>{{ $job->company_name }}</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> {{ $job->region }}
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">{{ $job->employment_status }}</span>
              </div>
            </div>
            
          </li>
           
          @endforeach
         

          

          
        </ul>

     

      </div>
    </section>





@endsection
