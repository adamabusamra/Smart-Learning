@extends('layouts.teacher-dashboard')

@section('title')
Project | Create Projects
@endsection

@section("sub_header")
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New Project</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter Project details and submit</span>
      </div>
      <!--end::Search Form-->
    </div>
    <!--end::Details-->
  </div>
</div>
<!--end::Subheader-->
@endsection


@section('page_css')
<link href="{{asset('assets/css/pages/wizard/wizard-3.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/pages/wizard/project-image-input.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
  integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
  crossorigin="anonymous" />
@endsection

@section('content')
<div class="card card-custom">
  <div class="card-body p-0">
    <!--begin: Wizard-->
    <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
      <!--begin: Wizard Nav-->
      <div class="wizard-nav">
        <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
          <!--begin::Wizard Step 1 Nav-->
          <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
            <div class="wizard-label">
              <h3 class="wizard-title">
                <span>1.</span>Setup Basic Info</h3>
              <div class="wizard-bar"></div>
            </div>
          </div>
          <!--end::Wizard Step 1 Nav-->
          <!--begin::Wizard Step 2 Nav-->
          <div class="wizard-step" data-wizard-type="step">
            <div class="wizard-label">
              <h3 class="wizard-title">
                <span>2.</span>Project Context</h3>
              <div class="wizard-bar"></div>
            </div>
          </div>
          <!--end::Wizard Step 2 Nav-->
          <!--begin::Wizard Step 3 Nav-->
          <div class="wizard-step" data-wizard-type="step">
            <div class="wizard-label">
              <h3 class="wizard-title">
                <span>3.</span>Enter Project Details</h3>
              <div class="wizard-bar"></div>
            </div>
          </div>
          <!--end::Wizard Step 3 Nav-->
        </div>
      </div>
      <!--end: Wizard Nav-->
      <!--begin: Wizard Body-->
      <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
        <div class="col-xl-12 col-xxl-7">
          <!--begin: Wizard Form-->
          <form class="form" id="kt_form" action="{{route('projects.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <!--begin: Wizard Step 1-->
            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
              <h4 class="mb-10 font-weight-bold text-dark">Setup Project Title, Image, Brief...</h4>
              <div class="row">
                <div class="col-xl-12">
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-left">Thumbnail</label>

                    <div class="col-lg-9 col-xl-9">
                      <div class="image-input image-input-outline" id="kt_user_add_avatar">
                        <div class="image-input-wrapper"
                          style="background-image: url({{asset ('project/images/default-project.png')}})">
                        </div>
                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                          data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                          <i class="fa fa-pen icon-sm text-muted"></i>
                          <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                          {{-- <input type="hidden" name="profile_avatar_remove" /> --}}
                        </label>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                          data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                          <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                      </div>
                      @error('image')
                      <div class="invalid-feedback image-input image-input-outline">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <!--begin::Input-->
              <div class="form-group">
                <label>Project Title</label>
                <input type="text" class="form-control" name="title" placeholder="Project Title"
                  value="{{old('title')}}" />
                <span class="form-text text-muted">Please enter project title</span>
              </div>
              @error('title')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <!--end::Input-->
              <!--begin::Input-->
              <div class="form-group">
                <label>Project Brief</label>
                <textarea class="form-control" name="short_description" cols="30" rows="5"
                  placeholder="Enter Project Brief">{{old('short_description')}}</textarea>
                <span class="form-text text-muted">Please enter project brief.</span>
              </div>
              @error('short_description')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <!--end::Input-->
              <!--begin::Input-->
              <div class="form-group">
                <div class="input-group input-daterange">
                  {{-- <label>Start Date</label> --}}
                  <input type="text" class="form-control" data-date-format="yyyy-mm-dd" name="start_date"
                    value="{{old('start_date')}}">
                  <div class="input-group-addon">To</div>
                  {{-- <label>End Date</label> --}}
                  <input type="text" class="form-control" data-date-format="yyyy-mm-dd" name="end_date"
                    value="{{old('end_date')}}">
                </div>
                {{-- <span class="form-text text-muted">Enter start date.</span> --}}
              </div>
              @error('short_description')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <!--end::Input-->
            </div>
            <!--end: Wizard Step 1-->
            <!--begin: Wizard Step 2-->
            <div class="pb-5" data-wizard-type="step-content">
              <h4 class="mb-10 font-weight-bold text-dark">Enter a detailed description of this project</h4>
              <div class="card card-custom">
                <div class="card-header">
                  <h3 class="card-title">
                    Project Context
                  </h3>
                </div>
                <div class="card-body">
                  <textarea name="long_description" id="kt-ckeditor-1">
                    {{old('long_description')}}
                    </textarea>
                </div>
                @error('long_description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <!--end: Wizard Step 2-->
            <!--begin: Wizard Step 3-->
            <div class="pb-5" data-wizard-type="step-content">
              <h4 class="mb-10 font-weight-bold text-dark">Enter Additional Info</h4>
              <!--begin::Resources Dynamic Input-->
              <div class="form-group">
                <label id="for-resources">Resources</label>
                <div class="input-group control-group after-add-more">
                  <input type="text" name="resources[]" id="resources" class="form-control add-more-input"
                    placeholder="Enter Resource Link" />
                  <div class="input-group-btn">
                    <button class="btn btn-primary add-more mx-auto" type="button">
                      <i class="ki ki-plus icon-md pl-1"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="copy d-none">
                <div class="control-group input-group" style="margin-top: 10px">
                  <input type="text" name="resources[]" class="form-control add-more-input"
                    placeholder="Enter Resource Link" />
                  <div class="input-group-btn">
                    <button class="btn btn-danger remove mx-auto" type="button">
                      <i class="ki ki-bold-close icon-md pl-1"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!--end::Resources Dynamic Input-->
              <!--begin::Select-->
              <div class="form-group">
                <label>Competencies</label>
                <select class="js-example-basic-multiple" name="competencies[]" multiple="multiple">
                  @if (!count($competencies))
                  <option value="" selected>No Competencies Avalable</option>
                  @else
                  @foreach ($competencies as $competency)
                  <option value="{{$competency->id}}" {{old('compitencies') ? 'selected' : ''}}>
                    {{$competency->name}}</option>
                  @endforeach
                  @endif
                </select>
                @error('competencies')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <!--end::Select-->
              <!--begin::Select-->
              <div class="form-group">
                <label>Technologies</label>
                <select class="js-example-basic-multiple" name="subjects[]" multiple="multiple">
                  @if (!count($subjects))
                  <option value="" selected>No Competencies Avalable</option>
                  @else
                  @foreach ($subjects as $subject)
                  <option value="{{$subject->id}}" {{old('subjects') ? 'selected' : ''}}>{{$subject->name}}</option>
                  @endforeach
                  @endif
                </select>
                @error('subjects')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <!--end::Select-->
              <div class="card card-custom">
                <div class="card-header">
                  <h3 class="card-title">
                    Project Deleverables
                  </h3>
                </div>
                <div class="card-body">
                  <textarea name="deliverables" id="kt-ckeditor-2">
                    {{old('deleverables')}}
                    </textarea>
                </div>
                @error('deleverables')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <!--end: Wizard Step 3-->
            <!--begin: Wizard Actions-->
            <div class="d-flex justify-content-between border-top mt-5 pt-10">
              <div class="mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                  data-wizard-type="action-prev">Previous</button>
              </div>
              <div>
                <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                  data-wizard-type="action-submit">Submit</button>
                <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                  data-wizard-type="action-next">Next</button>
              </div>
            </div>
            <!--end: Wizard Actions-->
          </form>
          <!--end: Wizard Form-->
        </div>
      </div>
      <!--end: Wizard Body-->
    </div>
    <!--end: Wizard-->
  </div>
</div>

@endsection

@section('page_scripts')
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>
<script src="{{asset('assets/js/pages/custom/wizard/create-project-wizard.js')}}"></script>
<!--end::Page Scripts-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
  integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
  $('.js-example-basic-multiple').select2({ 
    width: '100%',
    placeholder: 'Select a competency'
  });
    $('.input-daterange input').each(function() {
      $(this).datepicker('clearDates');
  });
});
</script>
@endsection