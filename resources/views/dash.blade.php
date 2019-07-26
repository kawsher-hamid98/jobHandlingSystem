@extends('layout')


@section('dash')

<p class = "text-center">This is Job save Page</p>

<div class="container col-10 col-md-4 jobSave">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 @if(session() -> has('success'))
    <div class="alert-success">
        {{ session() -> get('success') }}
    </div>
@endif

    <form method = "post" action = "/job_register">

        <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" name = "job_title" class = "form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_description">job Description</label>
                        <input type="text" name = "job_description" class = "form-control">
                    </div>
                </div>
            </div>

            <div class="row">

            	<div class="col-md-6">
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" name = "salary" class = "form-control">
                    </div>
                </div>
             

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name = "location" class = "form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name = "country" id = "myInput" class = "form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Add Job</button>
                </div>
            </div>

    </form>
</div>


@endsection