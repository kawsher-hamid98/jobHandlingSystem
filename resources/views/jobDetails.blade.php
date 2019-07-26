@extends('layout')


@section('home')

<p class = "text-center">This is Job Details</p>

<table class="table table-sm table-striped">

  <thead>
    <tr>
      	<th>Job Name</th>
		<th>Job Description</th>
		<th>Salary</th>
		<th>Location</th>
		<th>Country</th>
    </tr>
  </thead>

  <tbody>
  	@foreach($jobs as $job)
	    <tr>
	      	<td><a href="{{ url('/jobList/ . $job -> id') }}">{{ $job -> job_title}}</a></td>
			<td>{{ $job -> job_description}}</td>
			<td>{{ $job -> salary}}</td>
			<td>{{ $job -> location}}</td>
			<td>{{ $job -> country}}</td>
	    </tr>
    @endforeach
  </tbody>

</table>





@endsection