
<nav class="navbar navbar-expand-lg navbar-dark bg-success ">
    <div class="container">
      <a class="navbar-brand mb-0 h1" href="/"><i class="fa fa-headphones" aria-hidden="true"></i> CHEAPTALK</a>
      <div class="justify-content-center float-md-right" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link float-left" href="/"> Home</a>
          </li>
          @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="/dashboard"> Dashboard</a>
            </li>

            <div class="nav-item dropdown">
                <a class="nav-link text-white-50 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Category
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <ul>
                        @foreach(App\Models\Category::all() as $c)
                        <li><a class="dropdown-item" href="/categories/{{$c->id}}">{{$c->category}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <li class="nav-item">
                <a href="/authors" class="nav-link"> Users</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a> 
            </li>
              
          @else

          <li class="nav-item">
            <a class="nav-link" href="/register"> Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
              
          @endif
        </ul>
      </div>
    </div>
  </nav>