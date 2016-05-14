<!doctype html>
<html lang="en">
<!-- sama macam app -->
<head>
    <meta charset="UTF-8">
    <!-- <title>Dashboard | Dashboard</title> -->
    <title>@yield('title')</title>
    @include('includes.head')
</head>
<body>
  <div>
      <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
      <!--END BACK TO TOP-->

      <!--BEGIN TOPBAR-->
        @include('includes.topbar')
      <!--END TOPBAR-->
      <!--BEGIN WRAPPER-->
              <div id="wrapper">
                  <!--BEGIN SIDEBAR MENU-->
                    @include('includes.sidebarmenu')
                  <!--END SIDEBAR MENU-->

                  <!--BEGIN PAGE WRAPPER-->
                  <div id="page-wrapper">
                      <!--BEGIN TITLE & BREADCRUMB PAGE-->
                      <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                          <div class="page-header pull-left">
                              <div class="page-title">
                                  @yield('begin_title_left')</div>
                          </div>

                          <ol class="breadcrumb page-breadcrumb pull-right">
                              @yield('begin_title_right')
                                <!-- <i class="fa fa-angle-right"></i> -->
                                &nbsp;&nbsp;</li>
                              <!-- <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li> -->
                              <!-- <li class="active">Laman Utama</li> -->
                          </ol>
                          <div class="clearfix">
                          </div>
                      </div>
                      <!--END TITLE & BREADCRUMB PAGE-->
                      <!--BEGIN CONTENT-->
                      <div class="page-content">
                          <div id="tab-general">
                            @yield('content')
                          </div>
                      </div>
                      <!--END CONTENT-->
                        @include('includes.footer')
                      <!--BEGIN FOOTER-->

                      <!--END FOOTER-->
                  </div>
                  <!--END PAGE WRAPPER-->

              </div>
              <!--BEGIN WRAPPER-->

          </div>
          <!--end div after body-->
  @include('includes.script')
  @yield('script')

</body>
</html>
