<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
                <a class="navbar-brand" href="/">THE MUSEUM</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                ARTS
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                                <a class="dropdown-item" href="/painting">Painting</a>
                                                <a class="dropdown-item" href="/sculpture">Sculpture</a>
                                                <a class="dropdown-item" href="/statue">Statue</a>
                                                <a class="dropdown-item" href="/other">Others</a>
                                        </div>
                                </li>

                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                DONATIONS
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                                <a class="dropdown-item" href="/artfromyou">Arts</a>
                                                <a class="dropdown-item" href="/donation">Donate</a>
                                        </div>
                                </li>


                                <li class="nav-item">
                                        <a class="nav-link" href="/artist">ARTIST</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="/exhibition">EXHIBITION</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="/collection">COLLECTIONS</a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                    </li>
                                @else
                                
                                        <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="text-transform: uppercase;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                @if(auth()->check() && Auth::user()->status_admin == "0")
                                                <a class="dropdown-item" href="/booking/{{Auth::user()->id}}">
                                                        {{ __('MY BOOKING') }}
                                                </a>
                                                @endif
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                        {{ __('LOGOUT') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                </form>
                                                </div>
                                        </li>
                                @endguest
                        </ul>
                </div>
        </div>
</nav>

                        