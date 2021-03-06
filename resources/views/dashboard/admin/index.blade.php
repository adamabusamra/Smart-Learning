@extends('layouts.admin-dashboard')

@section('title')
Admin | Dashboard
@endsection

@section('page_css')

@endsection

@section("sub_header")
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-1">
      <!--begin::Page Heading-->
      <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">Firm's Statistics</h5>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="" class="text-muted">Statistics</a>
          </li>
        </ul>
        <!--end::Breadcrumb-->
      </div>
      <!--end::Page Heading-->
    </div>
    <!--end::Info-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <!--begin::Actions-->
      <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
      <!--end::Actions-->
      <!--begin::Dropdown-->
      <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="svg-icon svg-icon-success svg-icon-2x">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
              height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path
                  d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                  fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path
                  d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                  fill="#000000" />
              </g>
            </svg>
            <!--end::Svg Icon-->
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
          <!--begin::Navigation-->
          <ul class="navi navi-hover">
            <li class="navi-header font-weight-bold py-4">
              <span class="font-size-lg">Choose Label:</span>
              <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right"
                title="Click to learn more..."></i>
            </li>
            <li class="navi-separator mb-3 opacity-70"></li>
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="navi-text">
                  <span class="label label-xl label-inline label-light-success">Customer</span>
                </span>
              </a>
            </li>
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="navi-text">
                  <span class="label label-xl label-inline label-light-danger">Partner</span>
                </span>
              </a>
            </li>
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="navi-text">
                  <span class="label label-xl label-inline label-light-warning">Suplier</span>
                </span>
              </a>
            </li>
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="navi-text">
                  <span class="label label-xl label-inline label-light-primary">Member</span>
                </span>
              </a>
            </li>
            <li class="navi-item">
              <a href="#" class="navi-link">
                <span class="navi-text">
                  <span class="label label-xl label-inline label-light-dark">Staff</span>
                </span>
              </a>
            </li>
            <li class="navi-separator mt-3 opacity-70"></li>
            <li class="navi-footer py-4">
              <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                <i class="ki ki-plus icon-sm"></i>Add new</a>
            </li>
          </ul>
          <!--end::Navigation-->
        </div>
      </div>
      <!--end::Dropdown-->
    </div>
    <!--end::Toolbar-->
  </div>
</div>
@endsection



@section('content')
<!--begin::Statistics-->
<div class="row">
  <div class="col-lg-6">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">Classes Progress</h3>
        </div>
      </div>
      <div class="card-body">
        <!--begin::Chart-->
        <div id="chart_2"></div>
        <!--end::Chart-->
      </div>
    </div>
    <!--end::Card-->
  </div>
  <div class="col-lg-6">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">Students Submits</h3>
        </div>
      </div>
      <div class="card-body">
        <!--begin::Chart-->
        <div id="chart_4"></div>
        <!--end::Chart-->
      </div>
    </div>
    <!--end::Card-->
  </div>
</div>

<div class="d-flex flex-sm-row flex-column">
  <!--begin::Aside-->
  <div class="flex-md-row-auto w-sm-250px w-md-275px w-xl-325px">
    <!--begin::List Widget 9-->
    <div class="card card-custom gutter-b">
      <!--begin::Header-->
      <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
          <span class="font-weight-bolder text-dark">My Activity</span>
          <span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
        </h3>
        <div class="card-toolbar">
          <div class="dropdown dropdown-inline">
            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="ki ki-bold-more-hor"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
              <!--begin::Navigation-->
              <ul class="navi navi-hover">
                <li class="navi-header font-weight-bold py-4">
                  <span class="font-size-lg">Choose Label:</span>
                  <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right"
                    title="Click to learn more..."></i>
                </li>
                <li class="navi-separator mb-3 opacity-70"></li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-text">
                      <span class="label label-xl label-inline label-light-success">Customer</span>
                    </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-text">
                      <span class="label label-xl label-inline label-light-danger">Partner</span>
                    </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-text">
                      <span class="label label-xl label-inline label-light-warning">Suplier</span>
                    </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-text">
                      <span class="label label-xl label-inline label-light-primary">Member</span>
                    </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-text">
                      <span class="label label-xl label-inline label-light-dark">Staff</span>
                    </span>
                  </a>
                </li>
                <li class="navi-separator mt-3 opacity-70"></li>
                <li class="navi-footer py-4">
                  <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                    <i class="ki ki-plus icon-sm"></i>Add new</a>
                </li>
              </ul>
              <!--end::Navigation-->
            </div>
          </div>
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body pt-4">
        <!--begin::Timeline-->
        <div class="timeline timeline-6 mt-3">
          <!--begin::Item-->
          <div class="timeline-item align-items-start">
            <!--begin::Label-->
            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">08:42</div>
            <!--end::Label-->
            <!--begin::Badge-->
            <div class="timeline-badge">
              <i class="fa fa-genderless text-warning icon-xl"></i>
            </div>
            <!--end::Badge-->
            <!--begin::Text-->
            <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Outlines keep you honest. And
              keep structure</div>
            <!--end::Text-->
          </div>
          <!--end::Item-->
          <!--begin::Item-->
          <div class="timeline-item align-items-start">
            <!--begin::Label-->
            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>
            <!--end::Label-->
            <!--begin::Badge-->
            <div class="timeline-badge">
              <i class="fa fa-genderless text-success icon-xl"></i>
            </div>
            <!--end::Badge-->
            <!--begin::Content-->
            <div class="timeline-content d-flex">
              <span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>
            </div>
            <!--end::Content-->
          </div>
          <!--end::Item-->
          <!--begin::Item-->
          <div class="timeline-item align-items-start">
            <!--begin::Label-->
            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>
            <!--end::Label-->
            <!--begin::Badge-->
            <div class="timeline-badge">
              <i class="fa fa-genderless text-danger icon-xl"></i>
            </div>
            <!--end::Badge-->
            <!--begin::Desc-->
            <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Make deposit
              <a href="#" class="text-primary">USD 700</a>. to ESL</div>
            <!--end::Desc-->
          </div>
          <!--end::Item-->
          <!--begin::Item-->
          <div class="timeline-item align-items-start">
            <!--begin::Label-->
            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
            <!--end::Label-->
            <!--begin::Badge-->
            <div class="timeline-badge">
              <i class="fa fa-genderless text-primary icon-xl"></i>
            </div>
            <!--end::Badge-->
            <!--begin::Text-->
            <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving
              and keep structure keep great</div>
            <!--end::Text-->
          </div>
          <!--end::Item-->
          <!--begin::Item-->
          <div class="timeline-item align-items-start">
            <!--begin::Label-->
            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
            <!--end::Label-->
            <!--begin::Badge-->
            <div class="timeline-badge">
              <i class="fa fa-genderless text-danger icon-xl"></i>
            </div>
            <!--end::Badge-->
            <!--begin::Desc-->
            <div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">New order placed
              <a href="#" class="text-primary">#XF-2356</a>.</div>
            <!--end::Desc-->
          </div>
          <!--end::Item-->
          <!--begin::Item-->
          <div class="timeline-item align-items-start">
            <!--begin::Label-->
            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>
            <!--end::Label-->
            <!--begin::Badge-->
            <div class="timeline-badge">
              <i class="fa fa-genderless text-info icon-xl"></i>
            </div>
            <!--end::Badge-->
            <!--begin::Text-->
            <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Outlines keep and you honest.
              Indulging in poorly driving</div>
            <!--end::Text-->
          </div>
          <!--end::Item-->
        </div>
        <!--end::Timeline-->
      </div>
      <!--end: Card Body-->
    </div>
    <!--end: List Widget 9-->
    <!--begin::Mixed Widget 15-->
    <div class="card card-custom gutter-b">
      <!--begin::Header-->
      <div class="card-header border-0 pt-5">
        <h3 class="card-title font-weight-bolder">Trends</h3>
        <div class="card-toolbar">
          <div class="dropdown dropdown-inline">
            <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="ki ki-bold-more-hor"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
              <!--begin::Naviigation-->
              <ul class="navi">
                <li class="navi-header font-weight-bold py-5">
                  <span class="font-size-lg">Add New:</span>
                  <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right"
                    title="Click to learn more..."></i>
                </li>
                <li class="navi-separator mb-3 opacity-70"></li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-icon">
                      <i class="flaticon2-shopping-cart-1"></i>
                    </span>
                    <span class="navi-text">Order</span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-icon">
                      <i class="navi-icon flaticon2-calendar-8"></i>
                    </span>
                    <span class="navi-text">Members</span>
                    <span class="navi-label">
                      <span class="label label-light-danger label-rounded font-weight-bold">3</span>
                    </span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-icon">
                      <i class="navi-icon flaticon2-telegram-logo"></i>
                    </span>
                    <span class="navi-text">Project</span>
                  </a>
                </li>
                <li class="navi-item">
                  <a href="#" class="navi-link">
                    <span class="navi-icon">
                      <i class="navi-icon flaticon2-new-email"></i>
                    </span>
                    <span class="navi-text">Record</span>
                    <span class="navi-label">
                      <span class="label label-light-success label-rounded font-weight-bold">5</span>
                    </span>
                  </a>
                </li>
                <li class="navi-separator mt-3 opacity-70"></li>
                <li class="navi-footer pt-5 pb-4">
                  <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                  <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip"
                    data-placement="right" title="Click to learn more...">Learn more</a>
                </li>
              </ul>
              <!--end::Naviigation-->
            </div>
          </div>
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body d-flex flex-column">
        <!--begin::Chart-->
        <div class="flex-grow-1">
          <div id="kt_mixed_widget_15_chart" style="height: 150px"></div>
        </div>
        <!--end::Chart-->
        <!--begin::Items-->
        <div class="mt-5">
          <!--begin::Item-->
          <div class="d-flex align-items-center justify-content-between mb-5">
            <!--begin::Section-->
            <div class="d-flex align-items-center mr-2">
              <!--begin::Symbol-->
              <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                <div class="symbol-label">
                  <img src="assets/media/svg/misc/006-plurk.svg" class="h-50" alt="" />
                </div>
              </div>
              <!--end::Symbol-->
              <!--begin::Title-->
              <div>
                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Authors</a>
                <div class="font-size-sm text-muted font-weight-bold mt-1">Ricky Hunt, Sandra Trepp</div>
              </div>
              <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Label-->
            <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+82$
            </div>
            <!--end::Label-->
          </div>
          <!--end::Item-->
          <!--begin::Widget Item-->
          <div class="d-flex align-items-center justify-content-between mb-5">
            <!--begin::Section-->
            <div class="d-flex align-items-center mr-2">
              <!--begin::Symbol-->
              <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                <div class="symbol-label">
                  <img src="assets/media/svg/misc/015-telegram.svg" class="h-50" alt="" />
                </div>
              </div>
              <!--end::Symbol-->
              <!--begin::Title-->
              <div>
                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Sales</a>
                <div class="font-size-sm text-muted font-weight-bold mt-1">PitStop Emails</div>
              </div>
              <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Label-->
            <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+82$
            </div>
            <!--end::Label-->
          </div>
          <!--end::Widget Item-->
          <!--begin::Widget Item-->
          <div class="d-flex align-items-center justify-content-between">
            <!--begin::Section-->
            <div class="d-flex align-items-center mr-2">
              <!--begin::Symbol-->
              <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                <div class="symbol-label">
                  <img src="assets/media/svg/misc/003-puzzle.svg" class="h-50" alt="" />
                </div>
              </div>
              <!--end::Symbol-->
              <!--begin::Title-->
              <div>
                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top
                  Engagement</a>
                <div class="font-size-sm text-muted font-weight-bold mt-1">KT.com</div>
              </div>
              <!--end::Title-->
            </div>
            <!--end::Section-->
            <!--begin::Label-->
            <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+82$
            </div>
            <!--end::Label-->
          </div>
          <!--end::Widget Item-->
        </div>
        <!--end::Widget Items-->
      </div>
      <!--end::Body-->
    </div>
    <!--end::Mixed Widget 15-->
  </div>
  <!--end::Aside-->

  <!--begin::Content-->
  <div class="flex-row-fluid ml-sm-8">
    <div class="row">
      <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label">Timeline Chart</h3>
            </div>
          </div>
          <div class="card-body">
            <!--begin::Chart-->
            <div id="chart_6"></div>
            <!--end::Chart-->
          </div>
        </div>
        <!--end::Card-->
      </div>
      <div class="col-xxl-6">
        <!--begin::Mixed Widget 16-->
        <div class="card card-custom gutter-b">
          <!--begin::Header-->
          <div class="card-header border-0 pt-5">
            <div class="card-title">
              <div class="card-label">
                <div class="font-weight-bolder">Weekly Stats</div>
                {{-- <div class="font-size-sm text-muted mt-2">890,344 Sales</div> --}}
              </div>
            </div>
            <div class="card-toolbar">
              <div class="dropdown dropdown-inline">
                <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="ki ki-bold-more-hor"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                  <!--begin::Navigation-->
                  <ul class="navi navi-hover">
                    <li class="navi-header font-weight-bold py-4">
                      <span class="font-size-lg">Choose Label:</span>
                      <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right"
                        title="Click to learn more..."></i>
                    </li>
                    <li class="navi-separator mb-3 opacity-70"></li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-text">
                          <span class="label label-xl label-inline label-light-success">Customer</span>
                        </span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-text">
                          <span class="label label-xl label-inline label-light-danger">Partner</span>
                        </span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-text">
                          <span class="label label-xl label-inline label-light-warning">Suplier</span>
                        </span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-text">
                          <span class="label label-xl label-inline label-light-primary">Member</span>
                        </span>
                      </a>
                    </li>
                    <li class="navi-item">
                      <a href="#" class="navi-link">
                        <span class="navi-text">
                          <span class="label label-xl label-inline label-light-dark">Staff</span>
                        </span>
                      </a>
                    </li>
                    <li class="navi-separator mt-3 opacity-70"></li>
                    <li class="navi-footer py-4">
                      <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                    </li>
                  </ul>
                  <!--end::Navigation-->
                </div>
              </div>
            </div>
          </div>
          <!--end::Header-->
          <!--begin::Body-->
          <div class="card-body d-flex flex-column">
            <!--begin::Chart-->
            <div class="flex-grow-1">
              <div id="kt_mixed_widget_16_chart" style="height: 200px"></div>
            </div>
            <!--end::Chart-->
            <!--begin::Items-->
            <div class="mt-10 mb-5">
              <div class="row row-paddingless mb-10">
                <!--begin::Item-->
                <div class="col">
                  <div class="d-flex align-items-center mr-2">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                      <div class="symbol-label">
                        <span class="svg-icon svg-icon-lg svg-icon-info">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <path
                                d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                              <path
                                d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                fill="#000000" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                      </div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div>
                      <div class="font-size-h4 text-dark-75 font-weight-bolder">34</div>
                      <div class="font-size-sm text-muted font-weight-bold mt-1">Author Sales</div>
                    </div>
                    <!--end::Title-->
                  </div>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="col">
                  <div class="d-flex align-items-center mr-2">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                      <div class="symbol-label">
                        <span class="svg-icon svg-icon-lg svg-icon-danger">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <path
                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                fill="#000000" />
                              <rect fill="#000000" opacity="0.3"
                                transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                      </div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div>
                      <div class="font-size-h4 text-dark-75 font-weight-bolder">706</div>
                      <div class="font-size-sm text-muted font-weight-bold mt-1">Resources</div>
                    </div>
                    <!--end::Title-->
                  </div>
                </div>
                <!--end::Item-->
              </div>
              <div class="row row-paddingless">
                <!--begin::Item-->
                <div class="col">
                  <div class="d-flex align-items-center mr-2">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                      <div class="symbol-label">
                        <span class="svg-icon svg-icon-lg svg-icon-success">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <path
                                d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                              <path
                                d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                fill="#000000" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                      </div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div>
                      <div class="font-size-h4 text-dark-75 font-weight-bolder">49</div>
                      <div class="font-size-sm text-muted font-weight-bold mt-1">New Joiners</div>
                    </div>
                    <!--end::Title-->
                  </div>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="col">
                  <div class="d-flex align-items-center mr-2">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                      <div class="symbol-label">
                        <span class="svg-icon svg-icon-lg svg-icon-primary">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
                              <path
                                d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                fill="#000000" fill-rule="nonzero" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                      </div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div>
                      <div class="font-size-h4 text-dark-75 font-weight-bolder">8</div>
                      <div class="font-size-sm text-muted font-weight-bold mt-1">New Trainers</div>
                    </div>
                    <!--end::Title-->
                  </div>
                </div>
                <!--end::Item-->
              </div>
            </div>
            <!--end::Items-->
          </div>
          <!--end::Body-->
        </div>
        <!--end::Mixed Widget 16-->
      </div>
      <div class="col-xxl-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label">Student Distribution</h3>
            </div>
          </div>
          <div class="card-body">
            <!--begin::Chart-->
            <div id="chart_12" class="d-flex justify-content-center"></div>
            <!--end::Chart-->
          </div>
        </div>
        <!--end::Card-->
      </div>
    </div>
  </div>
  <!--end::Content-->
</div>
<!--end::Statistics-->
@endsection

@section('page_scripts')
{{-- <script src="{{asset('assets/js/pages/widgets.js')}}"></script> --}}
<script src="{{asset('assets/js/pages/features/charts/apexcharts-admin.js')}}"></script>


@endsection