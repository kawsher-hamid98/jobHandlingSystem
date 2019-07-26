<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>

    @include('others.css_files')
    @include('others.js_files')
</head>

<body>
    @include('others.nav')

    @yield('home')
    @yield('register')
    @yield('login')
    @yield('dash')
    @yield('Cregister')
    @yield('applicantdash')
    @yield('whoApply')


<!-- <div class="footer">
  <p>Footer</p>
</div>
 -->
    
</body>
</html>