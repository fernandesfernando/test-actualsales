<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQEdOW-_PLOSZw/company-logo_200_200/0?e=1596067200&v=beta&t=LyG8HgX-0eqzMg4_6OV-N9QgJ440H6A-CZ2yDzZPveE" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>Test Actual Sales</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                
            </div>
        </div>

        

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>