<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
    data-position="right" class="navbar-default navbar-static-side">
<div class="sidebar-collapse menu-scroll">
    <ul id="side-menu" class="nav">


         <div class="clearfix"></div>
        @if (Auth::user()->user_group == 1)
            <li><a href="{{ url('laman-utama') }}"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Laman Utama</span></a>
            </li>

            <li><a href="{!! url('news/create') !!}"><i class="fa fa-bullhorn fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Buat Pengumuman</span></a>

            </li>

            <li><a href="{!! url('news') !!}"><i class="fa fa-bullhorn fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Senarai Pengumuman</span></a>

            </li>

            <li><a href="{!! url('teacher/create') !!}"><i class="fa fa-user fa-fw">
                <div class="icon-bg bg-green"></div>
            </i><span class="menu-title">Daftar Guru</span></a>

            </li>

            <li><a href="{!! url('teacher') !!}"><i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Senarai Guru</span></a>

            </li>
            <li><a href="{!! url('student/create') !!}"><i class="fa fa-graduation-cap fa-fw">
                <div class="icon-bg bg-violet"></div>
            </i><span class="menu-title">Daftar Pelajar</span></a>

            </li>
            <li><a href="{!! url('student') !!}"><i class="fa fa-graduation-cap fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Senarai Pelajar</span></a>

            </li>

            <li><a href="{!! url('subject/create') !!}"><i class="fa fa-book fa-fw">
                <div class="icon-bg bg-blue"></div>
            </i><span class="menu-title">Daftar Subjek</span></a>

            </li>
            <li><a href="{!! url('subject') !!}"><i class="fa fa-book fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Senarai Subjek</span></a>
            </li>
            <li><a href="{!! url('classroom/create') !!}"><i class="fa fa-institution fa-fw">
                <div class="icon-bg bg-red"></div>
            </i><span class="menu-title">Daftar Kelas</span></a>

            </li>
            <li><a href="{!! url('classroom') !!}"><i class="fa fa-institution fa-fw">
                        <div class="icon-bg bg-red"></div>
                    </i><span class="menu-title">Senarai Kelas</span></a>

            </li>

            <li><a href="{!! url('classroomsubject/create') !!}"><i class="fa fa-info-circle fa-fw">
                <div class="icon-bg bg-yellow"></div>
            </i><span class="menu-title">Daftar Kelas Subjek</span></a>
            </li>

            <li><a href="{!! url('classroomsubject') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Kelas Subjek</span>
                </a>
            </li>
        @elseif (Auth::user()->user_group == 2)
            {{--Teacher Biasa--}}
            <li><a href="{{ url('laman-utama') }}">
                    <i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Laman Utama</span></a>
            </li>

            <li><a href="{!! url('task/create') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Beri Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('task') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('taskmark') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Markah Tugasan</span>
                </a>
            </li>

        @elseif (Auth::user()->user_group == 3)
            {{--Teacher Classroom--}}
            <li><a href="{{ url('laman-utama') }}">
                    <i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Laman Utama</span></a>
            </li>

            <li><a href="{!! url('task/create') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Beri Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('task') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('taskmark') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Markah Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('attendance') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Masukkan Kedatangan</span>
                </a>
            </li>

            <li><a href="{!! url('senarai-kedatangan') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Kedatangan</span>
                </a>
            </li>
        @elseif (Auth::user()->user_group == 4)
            {{--Teacher disiplin--}}
            <li><a href="{{ url('laman-utama') }}">
                    <i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Laman Utama</span></a>
            </li>

            <li><a href="{!! url('task/create') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Beri Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('task') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('taskmark') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Markah Tugasan</span>
                </a>
            </li>

            <li><a href="{!! url('studentoffense/create') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Masukkan Kesalahan Pelajar</span>
                </a>
            </li>

            <li><a href="{!! url('studentoffense') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Kesalahan Pelajar</span>
                </a>
            </li>

            <li><a href="{!! url('classsubjectexam/create') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Beri Markah Peperiksaan</span>
                </a>
            </li>

            <li><a href="{!! url('classsubjectexam') !!}">

                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Senarai Markah Peperiksaan</span>
                </a>
            </li>

        @elseif (Auth::user()->user_group == 5)
            {{--Student--}}
            <li><a href="{{ url('laman-utama') }}">
                    <i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Laman Utama</span></a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Kemaskini Profil</span>
                </a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title"> Tugasan Baharu</span>
                </a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title"> Pemarkahan Tugasan </span>
                </a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title"> Keputusan Peperiksaan </span>
                </a>
            </li>
        @else
            {{--Penjaga--}}
            <li><a href="{{ url('laman-utama') }}">
                    <i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Laman Utama</span></a>
            </li>
            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Kemaskini Profil </span>
                </a>
            </li>

            <li><a href="{!! url('CaretakerStudentTask/create') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Semakan Tugasan Pelajar </span>
                </a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Keputusan Peperiksaan  </span>
                </a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Laporan Disiplin Pelajar </span>
                </a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Laporan Kedatangan Pelajar </span>
                </a>
            </li>

            <li><a href="{!! url('xxx') !!}">
                    <i class="fa fa-info-circle fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title"> Pemberitahuan Sekolah </span>
                </a>
            </li>


        @endif

    </ul>
</div>
</nav>
