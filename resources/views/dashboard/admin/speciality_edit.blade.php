@extends('layouts.dashboard')

@section('title')
Speciality | Edit {{ $speciality->name}}
@endsection

@section("sub_header")
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Speciality</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $speciality->name }}</span>
      </div>
      <!--end::Search Form-->
    </div>
    <!--end::Details-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <!--begin::Button-->
      <a href="{{ route('specialities.index') }}"
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

          <form action="{{ route('specialities.update',$speciality->id) }}" method="POST" class="form" id="kt_form"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <!--begin::Create Speciality Form-->
            <div data-wizard-type="step-content" data-wizard-state="current">
              <h3 class="mb-10 font-weight-bold text-dark">Edit Speciality ({{$speciality->name}}):</h3>
              <div class="row">
                <div class="col-xl-12">
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Speciality Name</label>
                    <div class="col-lg-9 col-xl-9">
                      <input class="form-control form-control-lg  {{ $errors->has('name') ? 'is-invalid' :'' }}"
                        name="name" type="text" value="{{$speciality->name }}" placeholder="Speciality Name" />
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
                        rows="4">{{$speciality->description }}</textarea>
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
                        @foreach ($fields as $field)
                        <option value="{{$field->id}}" {{$field->id == $speciality->field->id ? 'selected' : '' }}>
                          {{$field->name}}</option>
                        @endforeach
                        @endif
                      </select>
                      @error('description')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Create Speciality Form-->
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
<script>
  var form = document.getElementById("kt_form");

document.getElementById("save-changes").addEventListener("click", function () {
  form.submit();
});
</script>
@endsection