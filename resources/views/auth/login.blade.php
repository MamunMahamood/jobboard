@extends('layouts.master')
@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Log In</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Log In</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    




    <section class="site-section">
      <div class="container">
        <div class="row">
      
          <div class="col-md-12">
          <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}" class="p-4 border rounded">
            @csrf

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

              

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" class="btn px-4 btn-primary text-white" value="{{ __('Log in') }}">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>



@endsection