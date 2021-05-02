@extends('layouts.admin-dashboard')

@section('title')
Field | Edit {{ $field->name}}
@endsection

@section("sub_header")
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Edit Field</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $field->name }}</span>
      </div>
      <!--end::Search Form-->
    </div>
    <!--end::Details-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <!--begin::Button-->
      <a href="{{ route('fields.index') }}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
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

          <form action="{{ route('fields.update',$field->id) }}" method="POST" class="form" id="kt_form"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <!--begin::Create Field Form-->
            <div data-wizard-type="step-content" data-wizard-state="current">
              <h3 class="mb-10 font-weight-bold text-dark">Edit Field ({{$field->name}}):</h3>
              <div class="row">
                <div class="col-xl-12">
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-left">Thumbnail</label>

                    <div class="col-lg-9 col-xl-9">
                      <div class="image-input image-input-outline" id="kt_user_add_avatar">
                        <div class="image-input-wrapper"
                          style="background-image: url({{asset ('field/images/'.$field->image)}})">
                        </div>
                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                          data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                          <i class="fa fa-pen icon-sm text-muted"></i>
                          <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                          {{-- <input type="hidden" name="field_image_remove" /> --}}
                        </label>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                          data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                      </div>
                      @error('field_image')
                      <div class="invalid-feedback image-input image-input-outline">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Field Name</label>
                    <div class="col-lg-9 col-xl-9">
                      <input class="form-control form-control-lg  {{ $errors->has('name') ? 'is-invalid' :'' }}"
                        name="name" type="text" value="{{$field->name }}" placeholder="Field Name" />
                      @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Field Description</label>
                    <div class="col-lg-9 col-xl-9">
                      <textarea
                        class="form-control form-control-lg  {{ $errors->has('description') ? 'is-invalid' :'' }}"
                        name="description" type="text" placeholder="Field Description"
                        rows="4">{{$field->description }}</textarea>
                      @error('description')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Create Field Form-->
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