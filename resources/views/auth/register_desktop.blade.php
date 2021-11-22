@extends('layouts.frontend.desktop.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/desktop/css/fontawesome-all.min.css') }}">

    <!-- BEGIN: Custom CSS-->
@endpush
@section('content')
    <div class="app-content content" >
        <div class="content-wrapper">

            <div class="content-body my-5">
                <section class="row flexbox-container" style="justify-content: center">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card  rounded-0 mb-0 p-4" >
                            <div class="row m-0">

                                <div>
                                    <img src="site_image/register.jpg" alt="login" width="400" style="padding-top: 15%">
                                </div>
                                <div class="p-0 ml-3">
                                    <div class="card rounded-0 " style="border: none !important; margin-bottom: 0 !important;">
                                        <div >
                                            <div class="card-title">
                                                <h4 class="pl-4">Register</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <div class="form-label-group mb-2">
                                                        <input id="inputName" value="{{ old('name') }}" name="name" autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" required>
                                                    </div>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-label-group mb-2">
                                                        <input type="email" id="inputEmail" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2">
                                                        <input type="number" id="inputPhone" class="form-control" @error('phone') is-invalid @enderror name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required autocomplete="phone">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>



                                                    <div class="form-label-group mb-2">
                                                        <input type="text" id="inputSchool" class="form-control" @error('school') is-invalid @enderror name="school" value="{{ old('school') }}" placeholder="School Name" required autocomplete="school">
                                                        @error('school')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2">
                                                        <input type="date" id="inputDOB" class="form-control" @error('dob') is-invalid @enderror name="dob" value="{{ old('dob') }}" placeholder="Date of Birth" required autocomplete="dob">
                                                        @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2">
                                                        <input type="text" id="inputZila" class="form-control" @error('zila') is-invalid @enderror name="zila" value="{{ old('zila') }}" placeholder="zila" required autocomplete="zila">
                                                        @error('zila')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group">
                                                        <select id="designation" name="designation" style="width: 100%">
                                                            <option value="" disabled selected>Designation</option>
                                                            <option value="coordinator">Coordinator</option>
                                                            <option value="joint_coordinator">Joint Coordinator</option>
                                                            <option value="school_representative">School Representative</option>
                                                            <option value="panel_member">Panel Member</option>
                                                            <option value="general_member">General Member</option>
                                                            <option value="other">Others</option>
                                                        </select>
                                                        @error('designation')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2"  style= "margin-top: 60px">
                                                        <input type="text" id="inputPermanentAddress" class="form-control" @error('permanentAddress') is-invalid @enderror name="permanentAddress" value="{{ old('permanentAddress') }}" placeholder="Permanent Address" required autocomplete="permanentAddress">
                                                        @error('permanentAddress')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2">
                                                        <input type="text" id="currentAddress" class="form-control" @error('currentAddress') is-invalid @enderror name="currentAddress" value="{{ old('currentAddress') }}" placeholder="Current Address" required autocomplete="currentAddress">
                                                        @error('permanentAddress')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group">
                                                        <select id="blood" name="blood" style="width: 100%">
                                                            <option value="" disabled selected>Blood Group</option>
                                                            <option vlaue="a_pos">A Positive</option>
                                                            <option vlaue="a_neg">A Negative</option>
                                                            <option vlaue="b_pos">B Positive</option>
                                                            <option vlaue="b_neg">B Negative</option>
                                                            <option vlaue="ab_pos">AB Positive </option>
                                                            <option vlaue="ab_neg">AB Negative</option>
                                                            <option vlaue="o_pos">O Positive</option>
                                                            <option vlaue="o_neg">O Negative</option>
                                                            <option vlaue="unknown">Unknown</option>
                                                        </select>
                                                        @error('blood')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2" style="margin-top: 60px">
                                                        <input type="text" id="inputBikash" class="form-control" @error('bikash') is-invalid @enderror name="bikash" value="{{ old('bikash') }}" placeholder="Bikash Number" required autocomplete="bikash">
                                                        @error('bikash')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2">
                                                        <input type="text" id="inputFB" class="form-control" @error('fb') is-invalid @enderror name="fb" value="{{ old('fb') }}" placeholder="Facebook ID" required autocomplete="fb">
                                                        @error('fb')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group mb-2" >

                                                        <input type="file" id="icon-pic" class="form-control" name="picture">

                                                        @error('picture')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="form-label-group mb-2">
                                                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-label-group mb-2">
                                                        <input type="password" id="inputConfPassword" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span style="font-size: 13px"> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="button-68" role="button">
                                                        <a href="{{route('login')}}" >Login</a>
                                                    </button>

                                                    <button type="submit" class="button-68" role="button">Register</button>


                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>



    @push('js')
        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('backendAsset/app-assets/vendors/js/vendors.min.js')}}"></script>
        <!-- BEGIN Vendor JS-->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- BEGIN: Theme JS-->
        <script src="{{asset('backendAsset/app-assets/js/core/app-menu.js')}}"></script>
        <script src="{{asset('backendAsset/app-assets/js/core/app.js')}}"></script>
        <script src="{{asset('backendAsset/app-assets/js/scripts/components.js')}}"></script>
        <!-- END: Theme JS-->
    @endpush

@endsection

