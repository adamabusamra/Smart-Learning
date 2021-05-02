@extends('layouts.admin-dashboard')

@section('title')
Speciality | Create Specialities
@endsection

@section("sub_header")
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New Speciality</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter speciality details and submit</span>
      </div>
      <!--end::Search Form-->
    </div>
    <!--end::Details-->
  </div>
</div>
<!--end::Subheader-->
@endsection


@section('page_css')
<link href="{{asset('assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!--begin::Card-->
<div class="card card-custom">
  <div class="card-body p-0">
    <!--begin::Wizard-->
    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
      <!--begin::Wizard Body-->
      <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-7">
          <!--begin::Form-->

          <form action="{{ route('specialities.store') }}" method="POST" class="form" id="kt_form"
            enctype="multipart/form-data">
            @csrf
            <!--begin::Create Speciality Form-->
            <div data-wizard-type="step-content" data-wizard-state="current">
              <h3 class="mb-10 font-weight-bold text-dark">Create Speciality:</h3>
              <div class="row">
                <div class="col-xl-12">
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Speciality Name</label>
                    <div class="col-lg-9 col-xl-9">
                      <input class="form-control form-control-lg  {{ $errors->has('name') ? 'is-invalid' :'' }}"
                        name="name" type="text" value="{{ old('name') }}" placeholder="Speciality Name" />
                      @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Speciality Description</label>
                    <div class="col-lg-9 col-xl-9">
                      <textarea
                        class="form-control form-control-lg  {{ $errors->has('description') ? 'is-invalid' :'' }}"
                        name="description" type="text" placeholder="Speciality Description"
                        rows="4">{{ old('description') }}</textarea>
                      @error('description')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Speciality Field</label>
                    <div class="col-lg-9 col-xl-9">
                      <select class="form-control form-control-lg  {{ $errors->has('field') ? 'is-invalid' :'' }}"
                        name="field">
                        @if (!count($fields))
                        <option value="" selected>No Fields</option>
                        @else
                        <option value="" selected hidden>Select Field</option>
                        @foreach ($fields as $field)
                        <option value="{{$field->id}}" {{old('field') == $field->id  ? 'selected':''}}>{{$field->name}}
                        </option>
                        @endforeach
                        @endif
                      </select>
                      @error('field')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Create Speciality Form-->

            <!--begin::Actions-->
            <div class="d-flex justify-content-end border-top pt-10">
              <div>
                <button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Create
                  Speciality</button>
              </div>
            </div>
            <!--end::Actions-->
          </form>
          <!--end::Form-->
        </div>
      </div>
      <!--end::Wizard Body-->
    </div>
  </div>
</div>
<!--end::Card-->
@endsection

@section('page_scripts')
<script src="{{ asset('assets/js/pages/custom/user/add-user.js')}}"></script>
@endsection