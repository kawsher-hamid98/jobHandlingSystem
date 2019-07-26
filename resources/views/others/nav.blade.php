<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Job App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>

      @if (Auth::guard('web')->check())
        <li class="nav-item active">
          <a class="nav-link" href="/dash">Add Job</a>
        </li>
      @endif

      <li class="nav-item">
        <a class="nav-link" href="/company_register">Company Register</a>
      </li>

      @if (Auth::guard('applicant')->check())
        <li class="nav-item">
          <a class="nav-link" href="/userDash">User Dash</a>
        </li>
      @endif

  <!--     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->

    </ul>

    <ul class="navbar-nav">

      @if(Auth::user())
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ ucwords(Auth::user() -> first_name) }}
          </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </li>

      @else

        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>

      @endif

    </ul>

  <!--   <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->

  </div>
</nav>