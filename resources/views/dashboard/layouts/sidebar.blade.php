<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="">
                <a href="{{ url('dashboard/home') }}">
                    <i class="fa fa-dashboard"></i> <span> DASHBOARD</span>
                </a>
            </li>

            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>USERS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('dashboard.users.create')}}"><i class="fa fa-user-plus"></i>ADD USER</a></li>
                    <li class=""><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-list"></i>ALL USERS</a></li>
                </ul>
            </li>
        

      
            {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashcube"></i> <span>{{ __('message.CATEGORIES') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="#"><i class="fa fa-plus"></i>{{ __('message.ADD_CATEGORY') }}</a></li>
                    <li class=""><a href="#"><i class="fa fa-list"></i> {{ __('message.LIST') }}</a></li>
                </ul>
            </li> --}}
           

           

           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>