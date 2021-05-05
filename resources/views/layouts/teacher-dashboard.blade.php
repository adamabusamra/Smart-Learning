<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="../../">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content=@yield('description') />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    @yield('page_css')
    <link href="{{asset ('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
      type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset ('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset ('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset ('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset ('assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset ('assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset ('assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset ('assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{asset ('assets/media/logos/favicon.png')}}" />
  </head>
  <!--end::Head-->
  <!--begin::Body-->

  <body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed max-w-92">
      <!--begin::Logo-->
      <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}" style="max-width: 92px;" />
      <!--end::Logo-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
          <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        {{-- <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
          <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle--> --}}
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
          <span class="svg-icon svg-icon-xl">
            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
              height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path
                  d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                  fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path
                  d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                  fill="#000000" fill-rule="nonzero" />
              </g>
            </svg>
            <!--end::Svg Icon-->
          </span>
        </button>
        <!--end::Topbar Mobile Toggle-->
      </div>
      <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
          <!--begin::Brand-->
          <div class="brand flex-column-auto" id="kt_brand">
            <!--begin::Logo-->
            <div class="brand-logo">
              <img alt="Logo" src="{{asset('assets/media/logos/logo-light.png')}}" width="140" />
            </div>
            <!--end::Logo-->
            <!--begin::Toggle-->
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
              <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                  height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path
                      d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                      fill="#000000" fill-rule="nonzero"
                      transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                    <path
                      d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                      fill="#000000" fill-rule="nonzero" opacity="0.3"
                      transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                  </g>
                </svg>
                <!--end::Svg Icon-->
              </span>
            </button>
            <!--end::Toolbar-->
          </div>
          <!--end::Brand-->
          <!--begin::Aside Menu-->
          <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
            <!--begin::Menu Container-->
            <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
              data-menu-dropdown-timeout="500">
              <!--begin::Menu Nav-->
              <ul class="menu-nav">
                <li class="menu-item" aria-haspopup="true">
                  <a href="{{route('teachers.index')}}" class="menu-link">
                    <i class="menu-icon flaticon-home"></i>
                    <span class="menu-text">Dashboard</span>
                  </a>
                </li>
                <li class="menu-section">
                  <h4 class="menu-text">Academic</h4>
                  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                  <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon2-file"></i>
                    <span class="menu-text">Projects</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                      <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('projects.create') }}" class="menu-link">
                          <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                          </i>
                          <span class="menu-text">Create Project</span>
                        </a>
                      </li>
                      <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('projects.index') }}" class="menu-link">
                          <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                          </i>
                          <span class="menu-text">All Projects</span>
                        </a>
                      </li>
                      <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('teacher.evaluation') }}" class="menu-link">
                          <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                          </i>
                          <span class="menu-text">Evaluations</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                  <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon2-chart"></i>
                    <span class="menu-text">Competencies</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                      <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('competencies.create') }}" class="menu-link">
                          <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                          </i>
                          <span class="menu-text">Add New Competency</span>
                        </a>
                      </li>
                      <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('competencies.index') }}" class="menu-link">
                          <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                          </i>
                          <span class="menu-text">All Competencies</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="menu-section">
                  <h4 class="menu-text">Education</h4>
                  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                  <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-layer"></i>
                    <span class="menu-text">Subjects / Technologies</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                      <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('subjects.index') }}" class="menu-link">
                          <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                          </i>
                          <span class="menu-text">New Subject / Technology</span>
                        </a>
                      </li>
                      <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('subjects.index') }}" class="menu-link">
                          <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                          </i>
                          <span class="menu-text">All Subjects</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

              </ul>
              <!--end::Menu Nav-->
            </div>
            <!--end::Menu Container-->
          </div>
          <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
          <!--begin::Header-->
          <div id="kt_header" class="header header-fixed">
            <!--begin::Container-->
            <div class="container-fluid d-flex align-items-stretch justify-content-between">
              <!--begin::Header Menu Wrapper-->
              <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <!--begin::Header Menu-->
                <!--end::Header Menu-->
              </div>
              <!--end::Header Menu Wrapper-->
              <!--begin::Topbar-->
              <div class="topbar">
                <!--begin::User-->
                <div class="topbar-item">
                  <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                    id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span
                      class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->first_name}}
                      {{auth()->user()->last_name}}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                      <img src="{{ asset('teacher/images/'.auth()->user()->image) }}" alt="" width="30">
                    </span>
                  </div>
                </div>
                <!--end::User-->
              </div>
              <!--end::Topbar-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Header-->
          <!--begin::Content-->
          <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Subheader-->
            @yield('sub_header')
            <!--end::Subheader-->
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
              <!--begin::Container-->
              <div class="container">
                @yield('content')
              </div>
              <!--end::Container-->
            </div>
            <!--end::Entry-->
          </div>
          <!--end::Content-->
          <!--begin::Footer-->
          <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
              <!--begin::Copyright-->
              <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2021©</span>
                <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Smart
                  Learning</a>
              </div>
              <!--end::Copyright-->
              <!--begin::Nav-->
              <div class="nav nav-dark">
                <a href="/about" target="_blank" class="nav-link pl-0 pr-5">About</a>
                <a href="/contact" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
              </div>
              <!--end::Nav-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
      <!--begin::Header-->
      <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">Teacher Profile</h3>
      </div>
      <!--end::Header-->
      <!--begin::Content-->
      <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
          <div class="symbol symbol-100 mr-5">
            <div class="symbol-label"
              style="background-image:url('{{asset("teacher/images/".auth()->user()->image)}}')">
            </div>
            <i class="symbol-badge bg-success"></i>
          </div>
          <div class="d-flex flex-column">
            <span class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{auth()->user()->first_name}}
              {{auth()->user()->last_name}}</span>
            {{-- <div class="text-muted mt-1">{{auth()->user()->speciality->name}}</div> --}}
          <div class="navi mt-2">
            <span class="navi-link p-0 pb-2">
              <span class="navi-icon mr-1">
                <span class="svg-icon svg-icon-lg svg-icon-primary">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path
                        d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                        fill="#000000" />
                      <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </span>
              <span class="navi-text text-muted text-hover-primary">{{auth()->user()->email }}</span>
            </span>
            <a class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5 mt-2" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Sign Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Separator-->
      <div class="separator separator-dashed mt-8 mb-5"></div>
      <!--end::Separator-->
    </div>
    <!--end::Content-->
    </div>
    <!-- end::User Panel-->
    <script>
      var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
      var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{asset ('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset ('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset ('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset ('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
    <script src="{{asset ('assets/plugins/custom/gmaps/gmaps.js')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    @yield('page_scripts')
    <script src="{{asset ('assets/js/pages/widgets.js')}}"></script>
    <!--end::Page Scripts-->
    <!--start::Sweet Alert Laravel-->
    @include('sweetalert::alert')
    <!--end::Sweet Alert Laravel-->
  </body>
  <!--end::Body-->

</html>