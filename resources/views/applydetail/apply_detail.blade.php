@extends('layouts.master')

@section('content')


<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('images/hero_1.jpg') }}');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Edit Apply Details</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Edit Apply Details</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>


<div class="container my-5">
    <h2>Edit</h2>

    <!-- Display validation errors, if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    

    <!-- Form to add a new job -->
    <form action="{{ url('apply-detail') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ old('job_title') }}" required>
        </div>

        

        <div class="mb-3">
            <label for="job_title" class="form-label">Career Objective</label>
            <!-- <input type="text" class="form-control" id="career_objective" name="career_objective" value="{{ old('career_objective') }}" required> -->
            <textarea class="form-control" id="career_objective" name="career_objective" rows="4" required>{{ old('career_objective') }}</textarea>
        </div>


        <div>
        <label for="photo">Add Photo:</label>
        <input type="file" name="photo" id="photo">
        </div>

        <div>
        <label for="cv">Add CV:</label>
        <input type="file" name="cv" id="cv">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>


@endsection