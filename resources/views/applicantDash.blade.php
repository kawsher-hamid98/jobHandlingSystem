
@extends('layout')
@section('applicantdash')

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h6 class="text-center">This is Applicant dash</h6>

@foreach($applicant as $applicants)
<div class="container">
	
	<div class="row">
		<div class="col-md-4">

			@if(session() -> has('imgSuccess'))
				<div class="alert-success">{{ session() -> get('imgSuccess') }}</div>
			@endif
			<img style="height: 15em" src="{{ URL::to('/proImage/' . $applicants -> proImgName) }}" alt="{{ $applicants -> proImgName }}" />

		</div>

		<div class="col-md-4">
			<p>Name: {{ $applicants -> first_name }}</p>
			<p>Email: {{ $applicants -> email }}</p>
			<p style="color:green">Skills: {{ $applicants -> skills }}, </p>
			   Resume: <a href="{{ asset('/resume/' . $applicants -> resumeName) }}">Check Resume</a>
		</div>

	</div>

</div>

@endforeach

<div class="col-md-4">

	<form method="post" action="/skills">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table>
			<thead>
				<tr>
					<th>Skills</th>
					<th><a href="#" id="addRow" class="btn btn-sm btn-success">+</a></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><input type="text" name="skills[]" class="form-control" ></td>
					<td><button class="btn btn-sm btn-danger remove">-</button></td>
				</tr>
			</tbody>
		</table>
		<button type="submit" class="btn btn-sm btn-success">Submit</button>
	</form>

</div>

<form method="post" action="/proImg" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="file"><br>
	<button type="submit" class="btn btn-success btn-sm">Upload Image</button>
</form>

<form method="post" action="/proResume" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="pd"><br>
	<button type="submit" class="btn btn-success btn-sm">Upload Resume</button>
</form>


</body>

<script type="text/javascript">
	var html = '<tr><td><input type="text" name="skills[]" class="form-control" ></td><td><button class="btn btn-sm btn-danger remove">-</button></td></tr>';

	$(function() {
		$('#addRow').click(function() {
			$('tbody').append(html);
		});

		$(document).on('click', '.remove', function() {
			$(this).parents('tr').remove();
		});
	});
</script>


</html>


@endsection