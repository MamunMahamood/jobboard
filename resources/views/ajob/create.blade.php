@extends('layouts.master')

@section('content')


<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Post A Job</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Post a Job</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>


<div class="container my-5">
    <h2>Add a New Job</h2>

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
    <form action="{{ url('add-ajob') }}" method="POST" enctype="multipart/form-data">
        @csrf



        <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
          <select class="form-control" id="category_id" name="category_id" required>
            <option value="">Select a Category</option>
               @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                     {{ $category->name }}
                  </option>
               @endforeach
           </select>
        </div>

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ old('job_title') }}" required>
        </div>

        <div class="mb-3">
            <label for="job_title" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Location</label>
            <input type="text" class="form-control" id="job_location" name="job_location" value="{{ old('job_location') }}" required>
        </div>

        <div class="mb-3">
            <label for="region" class="form-label">Region</label>
            <input type="text" class="form-control" id="region" name="region" value="{{ old('region') }}" required>
        </div>

        <div class="mb-3">
            <label for="vacancy" class="form-label">Vacancy</label>
            <input type="number" class="form-control" id="vacancy" name="vacancy" value="{{ old('vacancy') }}" required>
        </div>

        <div class="mb-3">
            <label for="job_title" class="form-label">Employment Status</label>
            <input type="text" class="form-control" id="employment_status" name="employment_status" value="{{ old('employment_status') }}" required>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Experience</label>
            <input type="text" class="form-control" id="experience" name="experience" value="{{ old('experience') }}" required>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{ old('salary') }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="application_deadline" class="form-label">Application Deadline</label>
            <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ old('application_deadline') }}" required>
        </div>

        

        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description</label>
            <textarea class="form-control" id="job_description" name="job_description" rows="4" required>{{ old('job_description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="responsibilities" class="form-label">Responsibilities</label>
            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" required>{{ old('responsibilities') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="education_experience" class="form-label">Education & Experience</label>
            <textarea class="form-control" id="education_experience" name="education_experience" rows="4" required>{{ old('education_experience') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="other_benefits" class="form-label">Other Benefits</label>
            <textarea class="form-control" id="other_benefits" name="other_benefits" rows="4">{{ old('other_benefits') }}</textarea>
        </div>


        <div>
        <label for="photo">photo:</label>
        <input type="file" name="jobimg" id="jobimg">
        </div>

        <button type="submit" class="btn btn-primary">Add Job</button>
    </form>
</div>


@endsection