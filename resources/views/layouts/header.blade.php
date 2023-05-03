<header id="tanahPro_header">
	
    <div class="header_wrapper">
        <nav class="navbar navbar-expand-lg navbar-light tanahpro_navbar">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo.jpg') }}" class="logo"
                    alt="Logo"></a>
            <button style="margin-right: 15px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item linked-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item submit_property">
                        <a class="nav-link"
                            href="{{route('all-company')}}">Companies</a>
                    </li>
                    <li class="nav-item submit_property">
                        <a class="nav-link"
                            href="">Stock view</a>
                    </li>
                    <li class="nav-item submit_property">
                        <a class="nav-link"
                            href="{{route('all-users')}}">Users</a>
                    </li>
                   
                    @guest
					@if (Route::has('login'))
						<li class="nav-item signin_tab">
							<a class="nav-link" href="{{ route('login') }}">Login</a>
						</li>
					@endif
                    @else
                        <li class="nav-item dropdown login_tab tanahpro_dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="username">
                                    @if (Auth::user()->email != null)
                                        {{ Auth::user()->email }}
                                    
                                    @endif
                                </span>
                                <span class="user"><img class="user_icon" src="{{ asset('images/user_white.png') }}"
                                        alt=""></span>
                            </a>
                            <div class="dropdown-menu tanahpro_dropdown_menu">
                                <a class="dropdown-item"
                                    href="{{ url('my-profile') }}">{{ __('My Profile') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                    
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="clearfix"></div>
</div>
