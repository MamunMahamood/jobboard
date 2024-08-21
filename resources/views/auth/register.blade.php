@extends('layouts.master')
@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Register</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Register</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    




<section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="p-4 border rounded">
            @csrf
            <div class="row form-group mb-4">
    <div class="col-md-12 mb-3 mb-md-0">
        <!-- Label for Name -->
        <label class="text-black" for="name">{{ __('Name') }}</label>

        <!-- Name Input Field -->
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="{{ __('Name') }}">

        <!-- Error Message for Name -->
        @if ($errors->has('name'))
            <span class="text-danger mt-2">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="row form-group mb-4">
    <div class="col-md-12 mb-3 mb-md-0">
        <!-- Label for Email -->
        <label class="text-black" for="email">{{ __('Email') }}</label>

        <!-- Email Input Field -->
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="{{ __('Email') }}">

        <!-- Error Message for Email -->
        @if ($errors->has('email'))
            <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
        @endif
    </div>
</div>
<div class="row form-group mb-4">
    <div class="col-md-12 mb-3 mb-md-0">
        <label class="text-black" for="password">{{ __('Password') }}</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}" required autocomplete="current-password">
        
        @if ($errors->has('password'))
            <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
        @endif
    </div>
</div>


<div class="row form-group mt-4 mb-4">
    <div class="col-md-12 mb-3 mb-md-0">
        <!-- Label for Confirm Password -->
        <label class="text-black" for="password_confirmation">{{ __('Confirm Password') }}</label>

        <!-- Confirm Password Input Field -->
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">

        <!-- Error Message for Confirm Password -->
        @if ($errors->has('password_confirmation'))
            <span class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>
</div>


<div>
        <label for="photo">photo:</label>
        <input type="file" name="photo" id="photo">
        </div>


<div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Already registered?') }}
                </a>
                
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" class="btn px-4 btn-primary text-white" value="{{ __('Register') }}">
                </div>
              </div>

    <!-- Register Button -->
</div>


              


            </form>
          </div>
      
        </div>
      </div>
    </section>


@endsection