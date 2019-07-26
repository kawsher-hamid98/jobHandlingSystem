@extends('layout')

@section('Cregister')

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>

<body>

<div class="container col-10 col-md-4 user_register1">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method = "post" action = "/company_register">

        <input type="hidden" name="_token" value="{{csrf_token()}}">

            <p class = "text-center">This is company_register Page</p>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name = "first_name" class = "form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name = "last_name" class = "form-control">
                    </div>
                </div>
            </div>

            <div class="row">

            	<div class="col-md-6">
                    <div class="form-group">
                        <label for="business_name">Business Name</label>
                        <input type="text" name = "business_name" class = "form-control">
                    </div>
                </div>
             

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name = "email" class = "form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name = "password" id = "myInput" class = "form-control">
                        <small>Use 8 or more characters</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name = "cpassword" id = "myInput" class = "form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </div>

    </form>
</div>

    <script>
        function myFunction() {

            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>



@endsection