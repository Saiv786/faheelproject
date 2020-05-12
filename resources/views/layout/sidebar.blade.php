<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{route('dashboard')}}"><img src="{{ asset('assets/images/logo.svg') }}" width="25" alt=""><span class="m-l-10">{{ config('app.name', 'Laravel') }}</span></a>
        <!-- <a href="{{route('dashboard')}}"><img src="{{ config('app.logo', '../assets/images/logo.svg') }}" width="25" alt=""><span class="m-l-10">{{ config('app.name', 'Laravel') }}</span></a> -->
    </div>
    <div class="menu">
        <ul class="list">
            @guest
            @else
            <li>
                <div class="user-info">
                    <div class="image"><a href="">
                            @if(Auth::user()->image_url)

                            <img src="{{ Auth::user()->image_url }}" alt="">
                            @else
                            <img src="{{asset('assets/images/default.png')}}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        @if(isset(Auth::user()->role))
                        <small>{{ Auth::user()->role->name }}</small>
                        @endif
                    </div>
                </div>
            </li>
            @endguest

            <li class="{{ Request::segment(1) === 'dashboard' ? 'active open' : null }}"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            @if(Auth::user())
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('profile')}}"><i class="zmdi zmdi-account"></i><span>My Profile</span></a></li>
            <li class="{{ Request::segment(1) === 'schedule' ? 'active open' : null }}"><a href="{{route('schedules')}}"><i class="zmdi zmdi-alarm"></i><span>Schedules</span></a></li>
            <li class="{{ Request::segment(1) === 'campaigns' ? 'active open' : null }}"><a href="{{route('campaigns')}}"><i class="zmdi zmdi-mail-send"></i><span>Campaigns</span></a></li>
            <li class="{{ Request::segment(1) === 'contacts' ? 'active open' : null }}"><a href="{{route('contacts')}}"><i class="zmdi zmdi-account-box-mail"></i><span>Contact Lists</span></a></li>
            <li class="{{ Request::segment(1) === 'templates' ? 'active open' : null }}"><a href="{{route('templates.index')}}"><i class="zmdi zmdi-assignment"></i><span>Templates</span></a></li>
            <li class="{{ Request::segment(1) === 'logs' ? 'active open' : null }}"><a href="{{route('activity_logs')}}"><i class="zmdi zmdi-menu"></i><span>Activity Logs</span></a></li>
            @endif
            <!-- <li class="{{ Request::segment(1) === 'app' ? 'active open' : null }}">
                <a href="#App" class="menu-toggle"><i class="zmdi zmdi-apps"></i> <span>App</span></a>
                <ul class="ml-menu">
                    <li class="{{ Request::segment(2) === 'inbox' ? 'active' : null }}"><a href="">Inbox</a></li>
                    <li class="{{ Request::segment(2) === 'chat' ? 'active' : null }}"><a href="">Chat</a></li>
                    <li class="{{ Request::segment(2) === 'calendar' ? 'active' : null }}"><a href="">Calendar</a></li>
                    <li class="{{ Request::segment(2) === 'contact-list' ? 'active' : null }}"><a href="">Contact list</a></li>
                </ul>
            </li> -->
            <!-- <li class="{{ Request::segment(1) === 'project' ? 'active open' : null }}">
                <a href="#Project" class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>Project</span></a>
                <ul class="ml-menu">
                    <li class="{{ Request::segment(2) === 'project-list' ? 'active' : null }}"><a href="">Project List</a></li>
                    <li class="{{ Request::segment(2) === 'taskboard' ? 'active' : null }}"><a href="">Taskboard</a></li>
                    <li class="{{ Request::segment(2) === 'ticket-list' ? 'active' : null }}"><a href="">Ticket List</a></li>
                    <li class="{{ Request::segment(2) === 'ticket-detail' ? 'active' : null }}"><a href="">Ticket Detail</a></li>
                </ul>
            </li> -->
            @guest
            <li class="{{ Request::segment(1) === 'authentication' ? 'active open' : null }}">
                <a title="Sign In" href="{{ route('login') }}"><i class="zmdi zmdi-sign-in"></i><span>Sign In</span></a>

            </li>
            @else
            <li class="{{ Request::segment(1) === 'authentication' ? 'active open' : null }}">
                <a title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Sign Out</span></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endguest
            <!-- <li class="{{ Request::segment(1) === 'authentication' ? 'active open' : null }}">
                <a href="#Authentication" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Authentication</span></a>
                <ul class="ml-menu">
                    <li class="{{ Request::segment(2) === 'login' ? 'active' : null }}"><a href="{{route('login')}}">Sign In</a></li>
                    <li class="{{ Request::segment(2) === 'register' ? 'active' : null }}"><a href="{{route('register')}}">Sign Up</a></li>
                </ul>
            </li> -->

        </ul>
    </div>
</aside>