@extends('layouts.master')
@section('content')



<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('images/hero_1.jpg') }}');" id="home-section">
            <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                <div class="card p-3 py-4">
                        
                        <div class="text-center">
                            <img src="{{$apply_candidate->photo }}" width="100" class="rounded-circle">
                        </div>
                        
                        <div class="text-center mt-3">
                            <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                            <h5 class="mt-2 mb-0">{{ $candidate->name }}</h5>
                            <span>{{ $apply_candidate->job_title }}</span>
                            
                            <div class="px-4 mt-1">
                                <p class="fonts">{{ $apply_candidate->career_objective }} </p>
                            
                            </div>
                            
                            <div class="px-3">
                            <a href="{{ $apply_candidate->cv }}" target="_blank">View CV</a>
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











@endsection
