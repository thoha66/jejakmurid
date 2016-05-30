<div id="header-topbar-option-demo" class="page-header-topbar">
    <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">
                @if (Auth::user()->user_group == 1)
                    Pentadbir
                @elseif (Auth::user()->user_group == 2)
                    Cikgu Subjek
                @elseif (Auth::user()->user_group == 3)
                    Cikgu Kelas
                @elseif (Auth::user()->user_group == 4)
                    Cikgu Disiplin
                @elseif (Auth::user()->user_group == 5)
                    Pelajar
                @else
                    Penjaga
                @endif

            </span><span style="display: none" class="logo-text-icon">µ</span></a></div>
    <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

        <ul class="nav navbar navbar-top-links navbar-right mbn">
            <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>

            </li>
            <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>

            </li>
            <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>

            </li>
            <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle text-capitalize"><img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">{{ Auth::user()->name }}</span>&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-user pull-right">
                    <li><a href="#"><i class="fa fa-user"></i>My Profile</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>
                    <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>
                    <li class="divider"></li>
                    <li><a href="{!! url('logout') !!}"><i class="fa fa-key"></i>Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</div>
