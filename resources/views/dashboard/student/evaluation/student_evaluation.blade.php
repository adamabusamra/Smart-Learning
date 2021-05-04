{{-- @extends((auth()->guard('teacher')->check() ? 'layouts.teacher-dashboard' : auth()->guard('student')->check() ?
'layouts.student-dashboard')) --}}
{{-- @extends('layouts.teacher-dashboard') --}}
@extends((auth()->guard('teacher')->check() ? 'layouts.teacher-dashboard' : 'layouts.student-dashboard'))


@section('title')
Evaluation | Evaluate All Projects
@endsection
@section('page_css')
<style>
  .header-fixed.subheader-fixed.subheader-enabled .wrapper {
    padding-top: 60px !important;
  }

  .project-card:hover {
    transform: scale(0.9);
    /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    cursor: pointer;
  }
</style>
@endsection

@section('content')
@csrf
<!--begin::Chat-->
<div class="d-flex flex-row">
  <!--begin::Aside-->
  <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
    <!--begin::Card-->
    <div class="card card-custom">
      <!--begin::Body-->
      <div class="card-body">
        <!--begin:Users-->
        <div class="mt-7 scroll scroll-pull">
          @foreach ($projects as $project)
          <!--begin:User-->
          <div class="d-flex align-items-center justify-content-between mb-5 p-5 rounded shadow-sm project-card"
            id="{{$project->id}}" onclick="selectProject(this.id)">
            <div class="d-flex align-items-center">
              <div class="symbol symbol-square symbol-50 mr-3">
                <img alt="Pic" src="{{asset('project/images/'.$project->image)}}" />
              </div>
              <div class="d-flex flex-column">
                <a class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{$project->title}}</a>
                <span class="text-muted font-weight-bold font-size-sm">{{auth()->user()->field->name}}</span>
              </div>
            </div>
          </div>
          <!--end:User-->
          @endforeach
        </div>
        <!--end:Users-->
      </div>
      <!--end::Body-->
    </div>
    <!--end::Card-->
  </div>
  <!--end::Aside-->
  <!--begin::Content-->
  <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
    <!--begin::Card-->
    <div class="card card-custom">
      <!--begin::Header-->
      <div class="card-header align-items-center px-4 py-3">
        <div class="text-left flex-grow-1">
          <!--begin::Aside Mobile Toggle-->
          <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
            <span class="svg-icon svg-icon-lg">
              <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg-->
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path
                    d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                    fill="#000000" opacity="0.3" />
                  <path
                    d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                    fill="#000000" />
                </g>
              </svg>
              <!--end::Svg Icon-->
            </span>
          </button>
          <!--end::Aside Mobile Toggle-->
        </div>
        <div class="text-center flex-grow-1">
          <div class="text-dark-75 font-weight-bold font-size-h5" id="project-title-place"></div>
        </div>
        <div class="text-right flex-grow-1">
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body">
        <!--begin::Scroll-->
        <div class="scroll scroll-pull" data-mobile-height="350">
          <!--begin::Messages-->
          <div class="messages" id="messages-place">
            {{-- <!--begin::Message In-->
            <div class="d-flex flex-column mb-5 align-items-start">
              <div class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-40 mr-3">
                  <img alt="Pic" src="assets/media/users/300_12.jpg" />
                </div>
                <div>
                  <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                  <span class="text-muted font-size-sm">2 Hours</span>
                </div>
              </div>
              <div
                class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                How likely are you to recommend our company to your friends and family?</div>
            </div>
            <!--end::Message In-->
            <!--begin::Message Out-->
            <div class="d-flex flex-column mb-5 align-items-end">
              <div class="d-flex align-items-center">
                <div>
                  <span class="text-muted font-size-sm">3 minutes</span>
                  <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                </div>
                <div class="symbol symbol-circle symbol-40 ml-3">
                  <img alt="Pic" src="assets/media/users/300_21.jpg" />
                </div>
              </div>
              <div
                class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.
              </div>
            </div>
            <!--end::Message Out--> --}}
          </div>
          <!--end::Messages-->
        </div>
        <!--end::Scroll-->
      </div>
      <!--end::Body-->
      <!--begin::Footer-->
      <div class="card-footer align-items-center" id="action-area">
        <!--begin::Compose-->
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
        <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message" name="message"></textarea>
        <div class="d-flex align-items-center justify-content-between mt-5">
          <div>
            <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6"
              id="user-submit-project">Send</button>
          </div>
        </div>
        <!--begin::Compose-->
      </div>
      <!--end::Footer-->
    </div>
    <!--end::Card-->
  </div>
  <!--end::Content-->
</div>
<!--end::Chat-->
@endsection

@section('page_scripts')
<script src="{{asset('assets/js/pages/custom/chat/student-submit-project.js')}}"></script>
{{-- <script src="{{asset('assets/js/pages/custom/chat/chat.js')}}"></script> --}}
@endsection