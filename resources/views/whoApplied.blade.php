@extends('layout')

@section('whoApply')

<div class="container col-sm-4">
	<table class="table table-sm table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Applicant's Name</th>
				<th>Subject</th>
				<th>Resume</th>
			</tr>
		</thead>

		<tbody>
			@foreach($application as $apply)
			<tr>
				<td>{{ $apply -> id }}</td>
				<td>{{ $apply -> first_name }}</td>
				<td>{{ $apply -> job_title }}</td>
				<td><a href="{{ asset('/resume/' . $apply -> resumeName) }}">Check Resume</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


@endsection