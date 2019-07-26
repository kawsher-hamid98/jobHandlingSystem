@extends('layout')


@section('home')

@if(session() -> has('registerSuccess'))
	<div class="alert alert-success">{{ session() -> get('registerSuccess') }}</div>
@endif

@if(session() -> has('Error'))
	<div class="alert alert-danger">{{ session() -> get('Error') }}</div>
@endif

<p class = "text-center">This is Job List</p>

<form method="get" action="/apply">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<table class="table table-sm table-striped">

	  <thead>
	    <tr>
	      	<th>Job Name</th>
			<th>Job Description</th>
			<th>Salary</th>
			<th>Location</th>
			<th>Country</th>
			<th>Apply</th>
	    </tr>
	  </thead>

	  <tbody>
	  	@foreach($jobs as $job)
		    <tr>
		      	<td><a href="{{ url('/list/'. $job -> id) }}">{{ $job -> job_title}}</a></td>
				<td>{{ $job -> job_description}}</td>
				<td>{{ $job -> salary}}</td>
				<td>{{ $job -> location}}</td>
				<td>{{ $job -> country}}</td>
				<td><a href="{{ url('/apply/'. $job -> id) }}">Apply</a></td>
		    </tr>
	    @endforeach
	  </tbody>

	</table>
</form>







@endsection