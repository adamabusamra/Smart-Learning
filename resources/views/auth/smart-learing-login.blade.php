<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->

    <head>
        <base href="../../">
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="description" content=@yield('description') />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        @yield('page_css')
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="{{asset ('assets/css/pages/login/login-4.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
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
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/loading-spinner.css')}}"> --}}

        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{asset ('assets/media/logos/favicon.png')}}" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->

    <body id="kt_body"
        class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        {{-- <!--Preloader area start here-->
        <div id="loader" class="loader orange-color">
            <div class="loader-container">
                <div class="loader-icon">
                    <img src="{{asset('assets/images/pre-logo1.png')}}" alt="" />
        </div>
        </div>
        </div>
        <!--Preloader area End here--> --}}
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Content-->
                <div
                    class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
                    <!--begin::Wrapper-->
                    <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                        <!--begin::Logo-->
                        <a href="#" class="login-logo pb-xl-10 pb-7" style="margin-left: -20px">
                            <img src="{{asset ('assets/media/logos/logo.png')}}" class="max-h-120px" alt="" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Signin-->
                        <div class="login-form">
                            <!--begin::Form-->
                            <form class="form" id="kt_login_singin_form"
                                action="{{ route('smart-learning.login.submit') }}" method="POST">
                                @csrf
                                <!--begin::Title-->
                                <div class="pb-5 pb-lg-15">
                                    <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
                                    <div class="text-muted font-weight-bold font-size-h4">Not in the right place?
                                        <a href="{{route('login')}}" class="text-primary font-weight-bolder">Admin
                                            Login</a></div>
                                </div>
                                <!--begin::Title-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
                                    <input
                                        class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror"
                                        type="text" name="email" autocomplete="email" value="{{ old('email') }}" />
                                    @error('email')
                                    <div class="fv-help-block">{{ $message }}</div>
                                    @enderror
                                    @if ($errors->has('bad-cred'))
                                    <div class="fv-help-block">{{ $errors->first('bad-cred') }}</div>
                                    @endif
                                    {{-- {{var_dump($errors)}} --}}

                                </div>

                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Your
                                            Password</label>
                                    </div>
                                    <input
                                        class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror"
                                        type="password" name="password" autocomplete="off" />
                                    @error('password')
                                    <div class="fv-help-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Action-->
                                <div class="pb-lg-0 pb-5">
                                    <button type="submit" id="kt_login_singin_form_submit_button"
                                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign
                                        In</button>
                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Content-->
                <!--begin::Aside-->
                <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
                    <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom"
                        style="background-image: url(assets/media/svg/illustrations/login-visual-4.svg);">
                        <!--begin::Aside title-->
                        <h3
                            class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
                            Learn the
                            <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Smart
                            <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Way</h3>
                        <!--end::Aside title-->
                    </div>
                </div>
                <!--end::Aside-->
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
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
        <!--begin::Page Scripts(used by this page)-->
        @yield('page_scripts')
        <script src="{{asset ('assets/js/pages/custom/login/login-main.js')}}"></script>
        <!--end::Page Scripts-->
        <!--start::Sweet Alert Laravel-->
        @include('sweetalert::alert')
        <!--end::Sweet Alert Laravel-->
    </body>
    <!--end::Body-->

</html>