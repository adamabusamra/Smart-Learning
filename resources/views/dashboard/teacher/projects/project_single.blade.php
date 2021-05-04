{{-- @extends((auth()->guard('teacher')->check() ? 'layouts.teacher-dashboard' : auth()->guard('student')->check() ?
'layouts.student-dashboard')) --}}
{{-- @extends('layouts.teacher-dashboard') --}}
@extends((auth()->guard('teacher')->check() ? 'layouts.teacher-dashboard' : 'layouts.student-dashboard'))

@section('title')
Project | {{$project->title}}
@endsection

@section("sub_header")
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Project</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center">
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> {{$project->title}}</h5>
      </div>
      <!--end::Search Form-->
    </div>
    <!--end::Details-->
  </div>
</div>
@endsection

@section('page_css')
<link href="{{asset('assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script> --}}
@endsection

@section('content')
<div class="card card-custom">
  <div class="card-body p-0">
    <!--begin::Invoice-->
    <div class="row justify-content-center pt-8 px-8 pt-md-27 px-md-0">
      <div class="col-md-9">
        <!-- begin: Invoice header-->
        <div class="rounded-xl overflow-hidden w-100 max-h-md-300px mb-20">
          <img src="{{asset('project/images/'.$project->image)}}" class="w-100" alt="" />
        </div>
        <div class="d-flex justify-content-between pb-10 pb-md-10 flex-column flex-md-column">
          <h1 class="display-4 font-weight-boldest mb-7">{{$project->title}}</h1>

          <p>{!! $project->short_description !!}</p>
        </div>
        <!--end: Invoice header-->
        <!--begin: Invoice body-->
        <div class="row border-bottom pb-10">
          <div class="col-md-9 py-md-10 pr-md-10">
            <h1 class="mb-5">Project Context</h1>
            {!! $project->long_description !!}
            <div class="border-bottom w-100 mt-7 mb-13"></div>
            <div class="d-flex flex-column flex-md-row">
              <div class="d-flex flex-column mb-10 mb-md-0">
                <div class="font-weight-bold font-size-h6 mb-3">Deliverables:</div>
                <div class="d-flex justify-content-between font-size-lg mb-3">
                  {!!$project->deliverables!!}
                </div>
              </div>
            </div>
            <div class="border-bottom w-100 mt-7 mb-13"></div>
            <div class="d-flex flex-column flex-md-row">
              <div class="d-flex flex-column mb-10 mb-md-0">
                <div class="font-weight-bold font-size-h6 mb-3">Resources:</div>
                @foreach (explode(",",$project->resources) as $resource )
                <div class="d-flex justify-content-between font-size-lg mb-3">
                  <a href="{{$resource}}" target="_blank">{{$resource}}</a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-md-3 border-left-md pl-md-10 py-md-10 text-right">
            <!--begin::Total Amount-->
            <div
              class="rounded d-flex align-items-center justify-content-between text-white max-w-425px position-relative ml-auto px-7 py-5 bgi-no-repeat bgi-size-cover bgi-position-center"
              style="background-image: url({{asset('assets/media/svg/shapes/abstract-10.svg')}});">
              <div class="font-weight-boldest font-size-h5">Competencies</div>
            </div>
            <!--end::Total Amount-->
            <hr class="w-100">
            <!--begin::Invoice To-->
            @foreach ($project->competencies as $comp)

            <div
              class="shadow border border-secondary rounded d-flex align-items-center justify-content-between text-white max-w-425px position-relative ml-auto px-7 py-5 bgi-no-repeat bgi-size-cover bgi-position-center mt-2"
              style="background-image: url({{asset('assets/media/svg/shapes/abstract-2.svg')}});">
              <div class="font-weight-boldest font-size-h5 text-dark ">{{$comp->name}}</div>
            </div>
            @endforeach
            <!--end::Invoice To-->
            <!--begin::Total Amount-->
            <div
              class="rounded d-flex align-items-center justify-content-between text-white max-w-425px position-relative ml-auto px-7 py-5 bgi-no-repeat bgi-size-cover bgi-position-center mt-30"
              style="background-image: url({{asset('assets/media/svg/shapes/abstract-9.svg')}});">
              <div class="font-weight-boldest font-size-h5">Technologies</div>
            </div>
            <!--end::Total Amount-->
            <hr class="w-100">
            <!--begin::Invoice To-->
            @foreach ($project->subjects as $sub)

            <div
              class="shadow border border-secondary rounded d-flex align-items-center justify-content-between text-white max-w-425px position-relative ml-auto px-7 py-5 bgi-no-repeat bgi-size-cover bgi-position-center mt-2"
              style="background-image: url({{asset('assets/media/svg/shapes/abstract-1.svg')}});">
              <div class="font-weight-boldest font-size-h5 text-dark ">{{$sub->name}}</div>
            </div>
            @endforeach
            <!--end::Invoice To-->
          </div>
        </div>
        <!--end: Invoice body-->
      </div>
    </div>
    <!-- begin: Invoice action-->
    <div class="row justify-content-center py-8 px-8 py-md-28 px-md-0">
      <div class="col-md-9">
        <div class="d-flex font-size-sm flex-wrap">
          <button type="button" class="btn btn-primary font-weight-bolder py-4 mr-3 mr-sm-14 my-1"
            onclick="window.print();">Print Brief</button>
          {{-- @if (auth()->guard('student')->check())
          <a href="#" type="button" class="btn btn-light-primary font-weight-bolder mr-3 my-1 pt-4">Submit Work</a>
          @endif --}}
          @if (auth()->guard('teacher')->check())
          <a href="{{route("teacher.evaluation")}}" class="btn btn-dark font-weight-bolder ml-sm-auto my-1 pt-4">View
            Submits</a>
          @endif
          @if (auth()->guard('student')->check())
          <a href="{{route("student.evaluation")}}" class="btn btn-dark font-weight-bolder ml-sm-auto my-1 pt-4">Submit
            Work</a>
          @endif
        </div>
      </div>
    </div>
    <!-- end: Invoice action-->
    <!--end::Invoice-->
  </div>
</div>
@endsection

@section('page_scripts')
<script src="{{ asset('assets/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>
@endsection