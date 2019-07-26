@extends('layout')

@section('login')

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>

<body>

<div class="container col-10 col-md-3 user_login1">


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method = "post" action = "/login">

        <input type="hidden" name="_token" value="{{csrf_token()}}">

            <p class = "header text-center">Sign In</p>

            <div class="form-group">
                <input type="email" name = "email" class = "form-control" placeholder = "Enter Email..">
            </div>

            <div class="form-group">
                <input type="password" name = "password" id = "myInput" class = "form-control" placeholder = "Enter Password..">
            </div>

            @if(Session() -> has('loginFail'))
                <div class="alert-danger">
                    {{ Session() -> get('loginFail') }}
                </div>
            @endif

            <div class="row">
                <div class="col-7">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>

                <div class="col-5">
                    <button type="submit" class="btn btn-success">Log In</button>
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