<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">


    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Home</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        @if(auth()->guest())
            @if(!Request::is('auth/login'))
                <li><a href="{{ url('/auth/login') }}">Login</a></li>
            @endif
            @if(!Request::is('auth/register'))
                <li><a href="{{ url('/auth/register') }}">Register</a></li>
            @endif
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>

                    <li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>
                </ul>
            </li>
        @endif

    </ul>



    {{--admin side navigation--}}
    @include('includes.admin_side_nav')
</nav>
