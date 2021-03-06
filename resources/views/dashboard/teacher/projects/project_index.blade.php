{{-- @extends((auth()->guard('teacher')->check() ? 'layouts.teacher-dashboard' : auth()->guard('student')->check() ?
'layouts.student-dashboard')) --}}
{{-- @extends('layouts.teacher-dashboard') --}}
@extends((auth()->guard('teacher')->check() ? 'layouts.teacher-dashboard' : 'layouts.student-dashboard'))


@section('title')
Project | Display All Projects
@endsection

@section("sub_header")
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Projects</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ count($projects) }} Total</span>
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

<!--begin::Row-->
<div class="row">
  @php
  $counter = 0
  @endphp

  @foreach ($projects as $project)
  <div class="col-xl-4">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
      <!--begin::Body-->
      <div class="card-body">
        <!--begin::Info-->
        <div class="d-flex align-items-center">
          <!--begin::Pic-->
          <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-square d-block">
            <img src="{{ asset('project/images/'.$project->image) }}" alt="image" style="max-width: 290px;
            height: 130px;" />
          </div>
          <!--end::Pic-->
          <!--begin::Toolbar-->
          <div class="card-toolbar mb-7">
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
              <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="ki ki-bold-more-hor"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <!--begin::Navigation-->
                <ul class="navi navi-hover">
                  <li class="navi-header pb-1">
                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Actions:</span>
                  </li>
                  @if (auth()->guard('teacher')->check())
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon2-graph-1"></i>
                      </span>
                      <span class="navi-text">View Submits</span>
                    </a>
                  </li>
                  @endif
                  @if (auth()->guard('student')->check())
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon2-graph-1"></i>
                      </span>
                      <span class="navi-text">Submit</span>
                    </a>
                  </li>
                  @endif
                  @if (auth()->guard('teacher')->check())

                  <li class="navi-item">
                    <a href="{{route('projects.edit',$project->id)}}" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon-edit"></i>
                      </span>
                      <span class="navi-text">Edit</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <form class='d-inline' action="{{route('projects.destroy',$project->id)}}" method="POST"
                      id="delete-project-form-{{$counter}}">
                      @csrf
                      @method('DELETE')
                      <a id="{{$counter}}" onclick="deleteFunction(this.id)" class="navi-link">
                        <span class="navi-icon">
                          <i class="flaticon-delete-1"></i>
                        </span>
                        <span class="navi-text">Delete</span>
                      </a>
                    </form>
                  </li>
                  @endif
                </ul>
                <!--end::Navigation-->
              </div>
            </div>
          </div>
          <!--end::Toolbar-->
        </div>
        <div>
          <!--begin::Info-->
          <div class="d-flex flex-column mr-auto mt-2">
            <!--begin: Title-->
            <div class="">
              @if(auth()->guard('teacher')->check())
              <a href="{{route('projects.show',$project->id)}}"
                class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$project->title}}</a>
              @else
              <a href=" /dashboard/student/projects/{{$project->id}}"
                class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$project->title}}</a>
              @endif
              <span
                class="ml-4 text-muted font-weight-bold">{{auth()->guard('teacher')->check() ? auth()->user()->speciality->field->name : auth()->user()->field->name }}</span>
            </div>
            <!--end::Title-->
          </div>
          <!--end::Info-->

        </div>
        <!--end::Info-->
        <!--begin::Description-->
        <div class="mb-10 mt-5 font-weight-bold" id="short_description">{{$project->short_description}}</div>
        <!--end::Description-->
        <!--begin::Data-->
        <div class="d-flex mb-5">
          <div class="d-flex align-items-center mr-7">
            <span class="font-weight-bold mr-4">Start</span>
            <span
              class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{date('d-m-Y', strtotime($project->start_date))}}</span>

          </div>
          <div class="d-flex align-items-center">
            <span class="font-weight-bold mr-4">Due</span>
            <span
              class="btn btn-light-{{$project->isOverDue($project->end_date) ? 'danger' : 'warning'}} btn-sm font-weight-bold btn-upper btn-text">{{date('d-m-Y', strtotime($project->end_date))}}</span>
          </div>
        </div>
        <!--end::Data-->
        <!--begin::Progress-->
        <div class="d-flex mb-5 align-items-cente">
          <span class="d-block font-weight-bold mr-5">Time Progress</span>
          <div class="d-flex flex-row-fluid align-items-center">
            <div class="progress progress-xs mt-2 mb-2 w-100">
              <div class="progress-bar bg-success" role="progressbar"
                style="width: {{$project->progress($project->start_date,$project->end_date)}}%;" aria-valuenow="50"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span
              class="ml-3 font-weight-bolder">{{$project->progress($project->start_date,$project->end_date)}}%</span>
          </div>
        </div>
        <!--ebd::Progress-->
      </div>
      <!--end::Body-->
      <!--begin::Footer-->
      {{-- <div class="card-footer d-flex align-items-sm-center flex-wrap flex-column flex-sm-row">
        <div class="d-flex">
          <div class="d-flex mr-7">
            <span class="svg-icon svg-icon-gray-500">
              <!--begin::Svg Icon | path:assets/media/svg/icons/Text/Bullet-list.svg-->
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path
                    d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z"
                    fill="#000000" />
                  <path
                    d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z"
                    fill="#000000" opacity="0.3" />
                </g>
              </svg>
              <!--end::Svg Icon-->
            </span>
            <a href="#" class="font-weight-boldest text-primary ml-2">72 Tasks</a>
          </div>
          <div class="d-flex mr-7">
            <span class="svg-icon svg-icon-gray-500">
              <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path
                    d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                    fill="#000000" />
                  <path
                    d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                    fill="#000000" opacity="0.3" />
                </g>
              </svg>
              <!--end::Svg Icon-->
            </span>
            <a href="#" class="font-weight-boldest text-primary ml-2">668 Comments</a>
          </div>
        </div>
      </div> --}}
      <!--end::Footer-->
    </div>
    <!--end:: Card-->
  </div>
  @php
  $counter++
  @endphp
  @endforeach
</div>
<!--end::Row-->
@endsection

@section('page_scripts')
<script src="{{ asset('assets/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  deleteFunction = (id)=>{
  var form = document.getElementById(`delete-project-form-${id}`)
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3699ff',
  cancelButtonColor: '#F64E60',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
  }
})
 }
</script>
<script>
  function truncateText(selector, maxLength) {
    var element = document.getElementById(selector),
        truncated = element.innerText;

    if (truncated.length > maxLength) {
        truncated = truncated.substr(0,maxLength) + '...';
    }
    return truncated;
}
//You can then call the function with something like what i have below.
document.getElementById('short_description').innerText = truncateText('short_description', 115);
</script>
@endsection