@extends('layouts.admin-dashboard')

@section('title')
Student | Create Students
@endsection

@section("sub_header")
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">
      <!--begin::Title-->
      <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New Student</h5>
      <!--end::Title-->
      <!--begin::Separator-->
      <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
      <!--end::Separator-->
      <!--begin::Search Form-->
      <div class="d-flex align-items-center" id="kt_subheader_search">
        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter Student details and submit</span>
      </div>
      <!--end::Search Form-->
    </div>
    <!--end::Details-->
  </div>
</div>
<!--end::Subheader-->
@endsection


@section('page_css')
{{-- <link href="{{asset('assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" /> --}}
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
                <h3 class="wizard-title">Study Field</h3>
                <div class="wizard-desc">Student's study field</div>
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
            <form class="form" id="kt_form" action="{{route('students.store')}}" method="POST">
              @csrf
              <!--begin: Wizard Step 1-->
              <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                <h4 class="mb-10 font-weight-bold text-dark">Enter Student's Account Details</h4>

                <div class="row">
                  <!--begin::Input-->
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control form-control-solid form-control-lg" name="first_name"
                        placeholder="First Name" value="{{ old('first_name') }}"
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
                        placeholder="Last Name" value="{{ old('last_name') }}"
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
                    placeholder="Email" value="{{ old('email') }}" {{ $errors->has('email') ? 'is-invalid' :'' }} />
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
                        placeholder="Address Line 1" value="{{ old('address1') }}"
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
                        placeholder="Address Line 2" value="{{ old('address2') }}"
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
                        <option value="" selected hidden>Select country</option>
                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
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
                        placeholder="City" value="{{old('city')}}" {{ $errors->has('city') ? 'is-invalid' :'' }} />
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
                  <label>Study Field:</label>
                  <select name="field" class="form-control form-control-solid form-control-lg"
                    {{ $errors->has('field') ? 'is-invalid' :'' }}>
                    @if (!count($fields))
                    <option value="" selected>No Fields</option>
                    @else
                    <option value="" selected hidden>Select Field</option>
                    @foreach ($fields as $field)
                    <option value="{{$field->id}}">{{$field->name}}</option>
                    @endforeach
                    @endif
                  </select>
                  @error('field')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <!--end::Select-->
              </div>
              <!--end: Wizard Step 3-->
              <!--begin: Wizard Actions-->
              <div class="d-flex justify-content-between border-top mt-5 pt-10">
                <div class="mr-2">
                  <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                    data-wizard-type="action-prev">Previous</button>
                </div>
                <div>
                  <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                    data-wizard-type="action-submit">Submit</button>
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
<script src="{{ asset('assets/js/pages/custom/wizard/create-student-wizard.js') }}"></script>
@endsection