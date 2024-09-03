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
<h2 class="section-title mb-2">Candidates List - {{$total_candidate_list}}</h2>

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


    

    <div class="table-responsive">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Photo</th>
      <th scope="col">job title</th>
      <th scope="col">Candidate Name</th>
      <th scope="col">Resume</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($all_candidate_list as $index => $candidate)
<tr>
  <th scope="row">{{ $index + 1 }}</th> <!-- Dynamic Serial Number -->
  <td><img src="{{ $candidate->photo }}" alt="Image" width="60"></td>
  <td>{{ $candidate->job_title }}</td>
  <td>{{ $candidate->user->name }}</td>
  
  <td><a href="{{ $candidate->cv }}" target="_blank">View CV</a></td>
  <td><a href="{{ route('candidate-profile', ['id' => $candidate->user->id]) }}"><span class="badge badge-danger">See Profile</span></a></td>

</tr>
@endforeach

   
  </tbody>
</table>


</div>

    

    <!-- Form to add a new job -->
   
</div>






@endsection