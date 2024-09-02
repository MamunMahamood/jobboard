@extends('layouts.job_master')

@section('content')


<header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.html" class="nav-link active">Home</a></li>
              <li><a href="about.html">About</a></li>
              
              <li><a href="profile.html">Profile</a></li>
            
              <li><a href="contact.html">Contact</a></li>
              <li><a href="{{route('job-section')}}">Jobs Section</a></li>
              <!-- <li><a href="contact.html">Applied Jobs</a></li>
              <li><a href="contact.html">Providing Jobs</a></li> -->
              <li class="d-lg-none"><a href="{{ route('post-job') }}"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="{{ route('login') }}">Log In</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">

            <a href="{{ route('post-job') }}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>

            @auth
              
              
              <a href="{{ route('logout') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
              <span class="mr-2 icon-lock_outline"></span>{{ __('Log Out') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
              </form>
            @else
              <a href="{{ route('register') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Register</a>
              <a href="{{ route('login') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>

            @endauth
              
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
</header>



<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('images/hero_1.jpg') }}');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Job</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Edit Apply Details</strong></span>
            </div>
          </div>
        </div>
      </div>
</section>



















@endsection































































