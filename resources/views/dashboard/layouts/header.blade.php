<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->

        <span class="logo-mini"><b>
            <img src="{{asset('theme/logo.png')}}" class="img-circle" alt="Logo Image">
        <!-- {{ Config::get('constants.SITE_SHORT_FIRST_NAME') }}</b>{{ Config::get('constants.SITE_SHORT_LAST_NAME') }} --></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="{{asset('theme/logo.png')}}" class="img-circle" alt="Logo Image">
            <!-- <b>{{ Config::get('constants.SITE_FIRST_NAME') }}</b>{{ Config::get('constants.SITE_LAST_NAME') }} --></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{-- @if (!empty(auth()->user()->avatar)) --}}
                            {{-- <img src="{{ asset(''.auth()->user()->avatar) }}"  class="user-image" alt="User Image"/> --}}
                            {{-- @else
                            <?php $NoImage = asset('theme/no_image.png'); ?>
                            <img src="{{ url($NoImage) }}" class="user-image" alt="User Image">
                            @endif --}}

                        {{-- <span class="hidden-xs">{{ auth()->user()->name }}</span> --}}
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                          {{-- @if (!empty(auth()->user()->avatar)) --}}
                            {{-- <img src="{{ asset(''.auth()->user()->avatar) }}" class="img-circle" alt="User Image"/> --}}
                            {{-- @else --}}
                            {{-- <img src="{{ url($NoImage) }}" class="img-circle" alt="User Image">
                            @endif --}}
                            <p>
                                {{-- {{ auth()->user()->name }}
                                <small>{{ auth()->user()->email }}</small> --}}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        

                        <!-- Menu Footer-->
                        <li class="user-footer" style="background-color: #12113e !important;">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">{{ __('message.PROFILE') }}</a>
                            </div>
                            <div class="pull-right">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('message.SIGN_OUT') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>