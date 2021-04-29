@extends('layouts.dashboard')

@section('title')
Teacher | Edit {{ $teacher->first_name}} {{ $teacher->last_name}}
@endsection

@section("sub_header")
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Teacher</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $teacher->first_name }}
          {{ $teacher->last_name }}</span>
      </div>
      <!--end::Search Form-->
    </div>
    <!--end::Details-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <!--begin::Button-->
      <a href="{{ route('teachers.index') }}"
        class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
      <!--end::Button-->
      <!--begin::Dropdown-->
      <div class="btn-group ml-2">
        <button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base" id="save-changes">Save
          Changes</button>
      </div>
      <!--end::Dropdown-->
    </div>
    <!--end::Toolbar-->
  </div>
</div>
@endsection


@section('page_css')
<link href="{{asset('assets/css/pages/wizard/wizard-2.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!--begin::Card-->
<div class="card card-custom">
  <div class="card-body p-0">
    <!--begin: Wizard-->
    <div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
      <!--begin: Wizard Nav-->
      <div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
        <!--begin::Wizard Step 1 Nav-->
        <div class="wizard-steps">
          <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
            <div class="wizard-wrapper">
              <div class="wizard-icon">
                <span class="svg-icon svg-icon-2x">
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
              </div>
              <div class="wizard-label">
                <h3 class="wizard-title">Basic Details</h3>
                <div class="wizard-desc">Setup Your Account Details</div>
              </div>
            </div>
          </div>
          <!--end::Wizard Step 1 Nav-->
          <!--begin::Wizard Step 2 Nav-->
          <div class="wizard-step" data-wizard-type="step">
            <div class="wizard-wrapper">
              <div class="wizard-icon">
                <span class="svg-icon svg-icon-2x">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path
                        d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z"
                        fill="#000000" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </div>
              <div class="wizard-label">
                <h3 class="wizard-title">Setup Address</h3>
                <div class="wizard-desc">Address, Street, City, Country</div>
              </div>
            </div>
          </div>
          <!--end::Wizard Step 2 Nav-->
          <!--begin::Wizard Step 3 Nav-->
          <div class="wizard-step" data-wizard-type="step">
            <div class="wizard-wrapper">
              <div class="wizard-icon">
                <span class="svg-icon svg-icon-2x">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path
                        d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z"
                        fill="#000000" />
                      <path
                        d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z"
                        fill="#000000" opacity="0.3" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </div>
              <div class="wizard-label">
                <h3 class="wizard-title">Teaching Speciality</h3>
                <div class="wizard-desc">Teacher's Field & Speciality</div>
              </div>
            </div>
          </div>
          <!--end::Wizard Step 3 Nav-->
        </div>
      </div>
      <!--end: Wizard Nav-->
      <!--begin: Wizard Body-->
      <div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
        <!--begin: Wizard Form-->
        <div class="row">
          <div class="offset-xxl-2 col-xxl-8">
            <form class="form" id="kt_form" action="{{route('teachers.update',$teacher->id)}}" method="POST">
              @csrf
              @method('put')
              <!--begin: Wizard Step 1-->
              <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                <h4 class="mb-10 font-weight-bold text-dark">Enter Teacher's Account Details</h4>

                <div class="row">
                  <!--begin::Input-->
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control form-control-solid form-control-lg" name="first_name"
                        placeholder="First Name" value="{{ $teacher->first_name }}"
                        {{ $errors->has('first_name') ? 'is-invalid' :'' }} />
                      <span class="form-text text-muted">Please enter first name.</span>
                      @error('first_name')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <!--end::Input-->
                  <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control form-control-solid form-control-lg" name="last_name"
                        placeholder="Last Name" value="{{ $teacher->last_name }}"
                        {{ $errors->has('last_name') ? 'is-invalid' :'' }} />
                      <span class="form-text text-muted">Please enter last name.</span>
                      @error('last_name')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <!--end::Input-->
                  </div>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control form-control-solid form-control-lg" name="email"
                    placeholder="Email" value="{{ $teacher->email }}" {{ $errors->has('email') ? 'is-invalid' :'' }} />
                  <span class="form-text text-muted">Please enter your email address.</span>
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <!--end::Input-->
                <div class="row">
                  <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control form-control-solid form-control-lg" name="password"
                        placeholder="Enter Password" value="" {{ $errors->has('password') ? 'is-invalid' :'' }} />
                      <span class="form-text text-muted">Please enter password.</span>
                      @error('password')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <!--end::Input-->
                  </div>
                  <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                      <label>Password Confirm</label>
                      <input type="password" class="form-control form-control-solid form-control-lg"
                        name="password_confirmation" placeholder="Confirm Password" value=""
                        {{ $errors->has('password') ? 'is-invalid' :'' }} />
                      <span class="form-text text-muted">Please confirm password.</span>
                    </div>
                    <!--end::Input-->
                  </div>
                </div>
              </div>
              <!--end: Wizard Step 1-->
              <!--begin: Wizard Step 2-->
              <div class="pb-5" data-wizard-type="step-content">
                <h4 class="mb-10 font-weight-bold text-dark">Setup Your Residence Location</h4>
                <div class="row">
                  <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                      <label>Address Line 1</label>
                      <input type="text" class="form-control form-control-solid form-control-lg" name="address1"
                        placeholder="Address Line 1" value="{{ $teacher->address1 }}"
                        {{ $errors->has('address1') ? 'is-invalid' :'' }} />
                      <span class="form-text text-muted">Please enter Address.</span>
                      @error('address1')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <!--end::Input-->
                  </div>
                  <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                      <label>Address Line 2</label>
                      <input type="text" class="form-control form-control-solid form-control-lg" name="address2"
                        placeholder="Address Line 2" value="{{ $teacher->a }}"
                        {{ $errors->has('address2') ? 'is-invalid' :'' }} />
                      <span class="form-text text-muted">Please enter Address.</span>
                      @error('address2')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <!--end::Input-->
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-6">
                    <!--begin::Select-->
                    <div class="form-group">
                      <label>Country</label>
                      <select name="country" class="form-control form-control-solid form-control-lg"
                        {{ $errors->has('country') ? 'is-invalid' :'' }}>
                        @foreach ($countries as $country)
                        <option value="{{$country}}" {{$teacher->country == $country ? 'selected' : '' }}>{{$country}}
                        </option>
                        @endforeach
                      </select>
                      @error('country')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <!--end::Input-->
                  </div>
                  <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control form-control-solid form-control-lg" name="city"
                        placeholder="City" value="{{$teacher->city}}" {{ $errors->has('city') ? 'is-invalid' :'' }} />
                      <span class="form-text text-muted">Please enter City.</span>
                      @error('city')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <!--end::Input-->
                  </div>
                </div>
              </div>
              <!--end: Wizard Step 2-->
              <!--begin: Wizard Step 3-->
              <div class="pb-5" data-wizard-type="step-content">
                <h4 class="mb-10 font-weight-bold text-dark">Select work field & speciality</h4>
                <!--begin::Select-->
                <div class="form-group">
                  <label>Field:</label>
                  <select name="field" class="form-control form-control-solid form-control-lg"
                    {{ $errors->has('field') ? 'is-invalid' :'' }}>
                    @if (!count($fields))
                    <option value="" selected>No Fields</option>
                    @else
                    <option value="" selected hidden>Select Field</option>
                    @foreach ($fields as $field)
                    <option value="{{$field->id}}" {{ $teacher->speciality->field->id == $field->id ? 'selected' : ''}}>
                      {{$field->name}}</option>
                    @endforeach
                    @endif
                  </select>
                  @error('field')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <!--end::Select-->
                <!--begin::Select-->
                <div class="form-group">
                  <label>Speciality:</label>
                  <select name="speciality" class="form-control form-control-solid form-control-lg"
                    {{ $errors->has('speciality') ? 'is-invalid' :'' }} {{old('speciality') ? 'selected':''}}>
                    <option value="">Please select a field first</option>
                    <option value="{{ $teacher->speciality_id}}" selected hidden>{{$teacher->speciality->name}}</option>
                  </select>
                  @error('speciality')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <!--end::Select-->
                <!--begin::Input-->
                <div class="form-group">
                  <label>Professional title</label>
                  <input type="text" class="form-control form-control-solid form-control-lg" name="title"
                    placeholder="Professional Title" value="{{$teacher->title}}"
                    {{ $errors->has('title') ? 'is-invalid' :'' }} />
                  <span class="form-text text-muted">Please enter professional title.</span>
                  @error('title')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <!--end::Input-->
              </div>
              <!--end: Wizard Step 3-->
              <!--begin: Wizard Actions-->
              <div class="d-flex justify-content-between border-top mt-5 pt-10">
                <div class="mr-2">
                  <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                    data-wizard-type="action-prev">Previous</button>
                </div>
                <div>
                  <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                    data-wizard-type="action-next">Next</button>
                </div>
              </div>
              <!--end: Wizard Actions-->
            </form>
          </div>
          <!--end: Wizard-->
        </div>
        <!--end: Wizard Form-->
      </div>
      <!--end: Wizard Body-->
    </div>
    <!--end: Wizard-->
  </div>
</div>
<!--end::Card-->
@endsection

@section('page_scripts')
<script src="{{ asset('assets/js/pages/custom/wizard/edit-teacher-wizard.js')}}"></script>
<script>
  var form = document.getElementById("kt_form");

document.getElementById("save-changes").addEventListener("click", function () {
  form.submit();
});
</script>
@endsection