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
<h2 class="section-title mb-2">Saved Jobs - {{$total_provided_jobs}}</h2>

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


    


    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">job title</th>
      <th scope="col">Company Name</th>
      <th scope="col">Employment Status</th>
      <th scope="col">Dead Line</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($all_provided_jobs as $index => $job)
<tr>
  <th scope="row">{{ $index + 1 }}</th> <!-- Dynamic Serial Number -->
  <td>{{ $job->job_title }}</td>
  <td>{{ $job->company_name }}</td>
  <td>{{ $job->employment_status }}</td>
  <td>{{ $job->application_deadline }}</td>
  <td><a href="{{ route('candidate-list', ['id' => $job->id]) }}"><span class="badge badge-danger">Applied Candidates list</span></a></td>
</tr>
@endforeach

   
  </tbody>
</table>

    

    <!-- Form to add a new job -->
   
</div>






@endsection