@extends('layouts.frontend.mobile.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/desktop/css/fontawesome-all.min.css') }}">

    <!-- BEGIN: Custom CSS-->
@endpush
@section('content')
    @include('layouts.frontend.mobile.parts.app_bar')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body my-5">
                <section >
                    <div class="col-xl-8 col-12 d-flex justify-content-center">
                        <div class="card  rounded-0 mb-0" >
                            <form method="POST" action="{{ route('user.registration') }}" enctype="multipart/form-data">
                                @csrf

                            <div class="row m-0">

                                <div class="w-100 text-center my-3">
                                    <div class="card-title">
                                        <h4 class="mb-">রেজিস্ট্রেশন   ফর্ম </h4>
                                    </div>
                                </div>


                                    <div  class="col-md-4 mb-4">
                                        <div class="form-label-group mb-3" >

                                            <div class="image-upload text-center">
                                                <label for="file-input">
                                                    <img src="https://i.ibb.co/JCgV84S/IMG-20211123-WA0033.jpg" width="350px"/>
                                                </label>
                                                <hr/>
                                                <label for="file-input">
                                                    <img src="https://www.pngrepo.com/png/95333/512/avatar.png" width="250px"/>
                                                </label>
                                                <br/>
                                                <span >এখানে ক্লিক করে ছবি সংযুক্ত করুন </span>

                                                <input id="file-input" type="file" name="profile_picture" style="display: none"/>




                                                @error('picture')
                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                @enderror

                                            </div>

                                            {{--                                        <input type="file" id="icon-pic" class="form-control" name="picture">--}}


                                        </div>
                                    </div>

                                <div class="col-11 p-0 ml-3 mb-4">
                                    <div class="card rounded-0 text-center" style="border: none !important; margin-bottom: 0 !important;">

                                        <div class="card-content">
                                            <div class="card-body pt-1">



                                                    <div class="form-label-group d-flex ">
{{--                                                        <label style="width: 30%">সদস্যের নাম</label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <input id="inputName" value="{{ old('name') }}" name="name" autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror" placeholder="সদস্যের নাম" required>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex ">
{{--                                                        <label style="width: 30%">ইমেইল</label>--}}
                                                        <small><span style="color: white;">*</span></small>
                                                        <input type="email" id="inputEmail"  @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" placeholder="ইমেইল" required autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex ">
{{--                                                        <label style="width: 30%">মোবাইল নাম্বার</label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <input type="number" id="inputPhone"  @error('phone') is-invalid @enderror name="phone" value="{{ old('phone') }}" placeholder="মোবাইল নাম্বার" required autocomplete="phone">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex ">
{{--                                                        <label style="width: 30%">বিদ্যালয়ের নাম</label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <input  id="inputSchool" @error('school') is-invalid @enderror name="school" value="{{ old('school') }}" placeholder="বিদ্যালয়ের নাম" required autocomplete="school">
                                                        @error('school')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex ">
{{--                                                        <label style="width: 30%">জন্ম তারিখ </label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <input  id="inputDOB"  @error('dob') is-invalid @enderror name="dob" value="{{ old('dob') }}" placeholder="জন্ম তারিখ" onfocus="(this.type='date')" required autocomplete="dob">
                                                        @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex ">
{{--                                                        <label style="width: 30%">জেলা / প্যানেল</label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <input  id="inputZila"  @error('zila') is-invalid @enderror name="zila" value="{{ old('zila') }}" placeholder="জেলা / প্যানেল" required autocomplete="zila">
                                                        @error('zila')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex">
{{--                                                        <label style="width: 30%">পদবি </label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <select id="designation" name="designation" style="width: 100%">
                                                            <option value="" disabled selected>পদবি</option>
                                                            <option value="coordinator">কোঅর্ডিনেটর</option>
                                                            <option value="joint_coordinator"> জয়েন্ট কোঅর্ডিনেটর</option>
                                                            <option value="school_representative">স্কুল প্রতিনিধি </option>
                                                            <option value="panel_member">প্যানেল সদস্য </option>
                                                            <option value="general_member">সাধারণ সদস্য</option>
                                                            <option value="other">অন্যান্য</option>
                                                        </select>
                                                        @error('designation')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex "  >
{{--                                                        <label style="width: 30%">স্থায়ী ঠিকানা </label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <input  id="inputPermanentAddress"  @error('permanentAddress') is-invalid @enderror name="permanentAddress" value="{{ old('permanentAddress') }}" placeholder="স্থায়ী ঠিকানা" required autocomplete="permanentAddress">
                                                        @error('permanentAddress')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex ">
{{--                                                        <label style="width: 30%">বর্তমান ঠিকানা </label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <input  id="currentAddress" @error('currentAddress') is-invalid @enderror name="currentAddress" value="{{ old('currentAddress') }}" placeholder="বর্তমান ঠিকানা" required autocomplete="currentAddress">
                                                        @error('permanentAddress')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex">
{{--                                                        <label style="width: 30%">রক্তের গ্রুপ</label>--}}
                                                        <small><span style="color: red;">*</span></small>
                                                        <select id="blood"  name="blood" style="width: 100%">
                                                            <option value="" disabled selected>রক্তের গ্রুপ</option>
                                                            <option vlaue="a_pos">এ পজিটিভ </option>
                                                            <option vlaue="a_neg">এ নেগেটিভ </option>
                                                            <option vlaue="b_pos">বি পজিটিভ </option>
                                                            <option vlaue="b_neg">বি নেগেটিভ </option>
                                                            <option vlaue="ab_pos">এবি পজিটিভ  </option>
                                                            <option vlaue="ab_neg">এবি নেগেটিভ </option>
                                                            <option vlaue="o_pos">ও পজিটিভ </option>
                                                            <option vlaue="o_neg">ও নেগেটিভ </option>
                                                            <option vlaue="unknown">অন্যান্য </option>
                                                        </select>
                                                        @error('blood')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group  d-flex" >
{{--                                                        <label style="width: 30%">যে নাম্বার থেকে বিকাশ করেছেন</label>--}}
                                                        <small><span style="color: white;">*</span></small>
                                                        <input  id="inputBikash"  @error('bikash') is-invalid @enderror name="bikash" value="{{ old('bikash') }}" placeholder="যে নাম্বার থেকে বিকাশ করেছেন" required autocomplete="bikash">
                                                        @error('bikash')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group  d-flex">
                                                        <small><span style="color: white;">*</span></small>
{{--                                                        <label style="width: 30%">ফেইসবুক আইডি</label>--}}
                                                        <input  id="inputFB"  @error('fb') is-invalid @enderror name="fb" value="{{ old('fb') }}" placeholder="ফেইসবুক আইডি" required autocomplete="fb">
                                                        @error('fb')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

{{--                                                    <div class="form-label-group d-flex ">--}}
{{--                                                        <label style="width: 30%">পাসওয়ার্ড</label>--}}
{{--                                                        <input type="password" id="inputPassword"  @error('password') is-invalid @enderror"  name="password" placeholder="পাসওয়ার্ড" required autocomplete="new-password">--}}
{{--                                                        @error('password')--}}
{{--                                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                                <strong>{{ $message }}</strong>--}}
{{--                                                            </span>--}}
{{--                                                        @enderror--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-label-group d-flex ">--}}
{{--                                                        <label style="width: 30%">কনফার্ম পাসওয়ার্ড</label>--}}
{{--                                                        <input type="password" id="inputConfPassword" name="password_confirmation"  placeholder="কনফার্ম পাসওয়ার্ড"  required autocomplete="new-password">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group row mb-2">--}}
{{--                                                        <div class="col-12">--}}
{{--                                                            <fieldset class="checkbox">--}}
{{--                                                                <div class="vs-checkbox-con vs-checkbox-primary">--}}
{{--                                                                    <input type="checkbox" checked>--}}
{{--                                                                    <span class="vs-checkbox">--}}
{{--                                                                        <span class="vs-checkbox--check">--}}
{{--                                                                            <i class="vs-icon feather icon-check"></i>--}}
{{--                                                                        </span>--}}
{{--                                                                    </span>--}}
{{--                                                                    <span style="font-size: 13px">আমি শর্তাবলী স্বীকার করি।</span>--}}
{{--                                                                </div>--}}
{{--                                                            </fieldset>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}







{{--                                                    <a href="{{route('login')}}" class="button-68">Login</a>--}}
                                                    <button type="submit" class="button-68">রেজিস্টার </button>

                                            </div>
                                        </div>

                                    </div>
                                </div>





                            </div>
                            </form>
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

