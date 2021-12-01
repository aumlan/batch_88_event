@extends('layouts.frontend.desktop.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/desktop/css/fontawesome-all.min.css') }}">
    <style>
        #img-preview {
            display: none;
            width: 155px;
            border: 2px dashed #333;
            margin-bottom: 20px;
        }
        #img-preview img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
    <!-- BEGIN: Custom CSS-->
@endpush
@section('content')

    <div class="app-content content" >
        <div class="content-wrapper">

            <div class="content-body my-5">
                <section class="row flexbox-container" style="justify-content: center">
                    <div class="col-xl-10 col-11 d-flex justify-content-center">
                        <div class="card  mb-0 p-4 w-100" style="border-radius: 10px;">
                            <div class="text-center mb-4">
                                <div class="card-title">
                                    <h4 class="pl-4">রেজিস্ট্রেশন   ফর্ম </h4>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('user.registration') }}" enctype="multipart/form-data">
                                @csrf
                            <div class="row m-0">



                                <div class="col-md-7 p-0 ml-3">
                                    <div class="card rounded-0 " style="border: none !important; margin-bottom: 0 !important;">
                                        <div class="card-content">
                                            <div class="card-body pt-1">


                                                    <div class="form-label-group d-flex mb-3">
                                                        <label style="width: 30%">সদস্যের নাম <span style="color: red;font-size: 17px;">*</span> </label>
                                                        <input id="inputName" value="{{ old('name') }}" name="name" autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror"  required>
                                                        <input type="hidden" id="inputName"
                                                               @php
                                                                   $randomNumber = 'b88-'. random_int(10000, 99999);
                                                               @endphp
                                                               value="{{ $randomNumber }}" name="uid" >
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex mb-3">
                                                        <label style="width: 30%">ইমেইল</label>
                                                        <input type="email" id="inputEmail" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}"  required autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex mb-3">
                                                        <label style="width: 30%">মোবাইল নাম্বার<span style="color: red;font-size: 17px;">*</span></label>
                                                        <input type="number" id="inputPhone" class="form-control" @error('phone') is-invalid @enderror name="phone" value="{{ old('phone') }}"  required autocomplete="phone">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex mb-3">
                                                        <label style="width: 30%">বিদ্যালয়ের নাম<span style="color: red;font-size: 17px;">*</span></label>
                                                        <input type="text" id="inputSchool" class="form-control" @error('school') is-invalid @enderror name="school" value="{{ old('school') }}"  required autocomplete="school">
                                                        @error('school')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex mb-3">
                                                        <label style="width: 30%">জন্ম তারিখ <span style="color: red;font-size: 17px;">*</span></label>
                                                        <input type="date" id="inputDOB" class="form-control" @error('dob') is-invalid @enderror name="dob" value="{{ old('dob') }}"  required autocomplete="dob">
                                                        @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex mb-3">
                                                        <label style="width: 30%">জেলা / প্যানেল<span style="color: red;font-size: 17px;">*</span></label>
                                                        <input type="text" id="inputZila" class="form-control" @error('zila') is-invalid @enderror name="zila" value="{{ old('zila') }}"  required autocomplete="zila">
                                                        @error('zila')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex">
                                                        <label style="width: 30%">পদবি <span style="color: red;font-size: 17px;">*</span></label>
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

                                                    <div class="form-label-group d-flex mb-3"  style= "margin-top: 15px">
                                                        <label style="width: 30%">স্থায়ী ঠিকানা <span style="color: red;font-size: 17px;">*</span></label>
                                                        <input type="text" id="inputPermanentAddress" class="form-control" @error('permanentAddress') is-invalid @enderror name="permanentAddress" value="{{ old('permanentAddress') }}"  required autocomplete="permanentAddress">
                                                        @error('permanentAddress')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex mb-3">
                                                        <label style="width: 30%">বর্তমান ঠিকানা <span style="color: red;font-size: 17px;">*</span></label>
                                                        <input type="text" id="currentAddress" class="form-control" @error('currentAddress') is-invalid @enderror name="currentAddress" value="{{ old('currentAddress') }}"  required autocomplete="currentAddress">
                                                        @error('permanentAddress')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-label-group d-flex">
                                                        <label style="width: 30%">রক্তের গ্রুপ<span style="color: red;font-size: 17px;">*</span></label>
                                                        <select id="blood" name="blood" style="width: 100%">
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

                                                    <div class="form-label-group mb-3 d-flex" style="margin-top: 15px">
                                                        <label style="width: 30%">যে নাম্বার থেকে বিকাশ করেছেন</label>
                                                        <input type="text" id="inputBikash" class="form-control" @error('bikash') is-invalid @enderror name="bikash" value="{{ old('bikash') }}"  required autocomplete="bikash" style="height: 40px">
                                                        @error('bikash')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                <div class="form-label-group mb-3 d-flex" style="margin-top: 15px">
                                                    <label style="width: 30%">যে নাম্বারে বিকাশ করেছেন</label>
                                                    <input type="text" id="inputBikashto" class="form-control" @error('bikashto') is-invalid @enderror name="bikashto" value="{{ old('bikashto') }}"  required autocomplete="bikashto" style="height: 40px">
                                                    @error('bikashto')
                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>

                                                    <div class="form-label-group mb-3 d-flex">
                                                        <label style="width: 30%">ফেইসবুক আইডি</label>
                                                        <input type="text" id="inputFB" class="form-control" @error('fb') is-invalid @enderror name="fb" value="{{ old('fb') }}"  required autocomplete="fb">
                                                        @error('fb')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

{{--                                                    <div class="form-label-group d-flex mb-3">--}}
{{--                                                        <label style="width: 30%">পাসওয়ার্ড</label>--}}
{{--                                                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password">--}}
{{--                                                        @error('password')--}}
{{--                                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                                <strong>{{ $message }}</strong>--}}
{{--                                                            </span>--}}
{{--                                                        @enderror--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-label-group d-flex mb-3">--}}
{{--                                                        <label style="width: 30%">কনফার্ম পাসওয়ার্ড</label>--}}
{{--                                                        <input type="password" id="inputConfPassword" name="password_confirmation" class="form-control"  required autocomplete="new-password">--}}
{{--                                                    </div>--}}

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
                                                                    <span style="font-size: 13px">আমি শর্তাবলী স্বীকার করি।</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    {{--                                                    <button type="submit" class="button-68" role="button">--}}
                                                    {{--                                                        <a href="{{route('login')}}" >Login</a>--}}
                                                    {{--                                                    </button>--}}

                                                    <button type="submit" class="button-68" role="button">রেজিস্টার </button>



                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div  class="col-md-4 ml-5">
                                    <div class="form-label-group mb-3" >

                                        <div class="image-upload text-center">
                                            <label for="file-input">
                                                <img src="https://www.pngrepo.com/png/95333/512/avatar.png" width="250px"/>
                                            </label>
                                            <br/>
                                            <span >এখানে ক্লিক করে ছবি সংযুক্ত করুন </span>

                                            <input id="file-input" type="file" name="profile_picture" style="display: none"/>
                                            <br/>
                                            <hr/>
                                            <br/>

                                            <label for="file-input">
                                                <img src="https://i.ibb.co/JCgV84S/IMG-20211123-WA0033.jpg" width="350px"/>
                                            </label>

                                            @error('picture')
                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                            @enderror

                                        </div>

                                        {{--                                        <input type="file" id="icon-pic" class="form-control" name="picture">--}}


                                    </div>



                                </div>


                            </div>
                            </form>
                        </div>
                    </div>
                </section>

                <section class="product-area pd-top-35 mb-5">

                    <div class="container">
                        {{--            <div class="row  mb-4 justify-content-center">--}}
                        {{--                <div class="col-lg-3">--}}
                        {{--                    <div class="section-title fancy-border">--}}
                        {{--                        <span class="option_highlight">Contact Us</span>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                        {{--            </div>--}}
                        <div class="screen">

                            <div class="screen-body">
                                <div class="screen-body-item left">
                                    <div class="app-title">
                                        <span style="color: green">যোগাযোগ </span>
                                    </div>

                                </div>
                                <div class="screen-body-item">
                                    <div class="app-form">
                                        <div class="app-form-group">
                                            <input class="app-form-control text-dark" placeholder="নাম " value="">
                                        </div>
                                        <div class="app-form-group">
                                            <input class="app-form-control text-dark" placeholder="ইমেইল ">
                                        </div>
                                        <div class="app-form-group">
                                            <input class="app-form-control text-dark" placeholder="মোবাইল ">
                                        </div>
                                        <div class="app-form-group message">
                                            <input class="app-form-control text-dark" placeholder="ম্যাসেজ ">
                                        </div>
                                        <div class="app-form-group buttons">
                                            <button class=" button-68">বাদ দিন </button>
                                            <button class=" button-68">সাবমিট </button>
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

