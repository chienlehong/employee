<nav class="navbar navbar-dark bg-dark p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Bài tập</a>
    <form class="d-flex  w-50 mt-3" method="GET">
        @csrf
        @method('GET')
        <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <ul class="navbar-nav px-3 d-flex pt-3">
        @if (Auth::check())
            <div class="d-flex">
                <p class="text-white mt-2 me-2"> Welcome, {{ Auth::user()->name }}</p>
                <li class="nav-item">
                    <form action="{{ route('singout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="nav-link" href="#"><button>Sign out</button></a>
                    </form>
                </li>
            </div>
        @else
            <div class="d-flex">
                <li class="nav-item">
                    <a class="nav-link" href="/login"><button>Login</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register"><button>Register</button></a>
                </li>
            </div>
        @endif
    </ul>
</nav>
