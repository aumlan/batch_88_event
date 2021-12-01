@extends('layouts.frontend.mobile.master')


@push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/desktop/css/fontawesome-all.min.css') }}">
@endpush
@section('content')
    @include('layouts.frontend.mobile.parts.app_bar')

    <div class="container">
        <div class="mt-5">
            <h2 style="font-weight: 600"> কালচারাল ফোরাম</h2>
            <h6>Last updated: October 2021</h6>
        </div>
        <hr>
        <div class="row d-flex">
            {{--            <div class="col-md-12">--}}

            {{--                <p style="font-size: 1.2rem"><ion-icon name="play-circle"></ion-icon><span class="ml-2" style="font-size: 1.5rem">Our Vision</span></p>--}}
            {{--                <br/>--}}
            {{--                <p class="text-justify term-conditions mb-2" >--}}
            {{--                    Our vision is to be regarded as the firm that provides unique--}}
            {{--                    majestic fragrance and flavour attributes that represent the distinct--}}
            {{--                    style of each individual character, event and experience.</p>--}}

            {{--            </div>--}}
            <div class="col-md-12 pt-4 text-center">
                {{--                <img src="/site_image/WA0005.jpg" alt="Girl in a jacket" width="400" >--}}
                {{--                <img src="/site_image/WA0005.jpg" alt="Girl in a jacket" width="400" >--}}
            </div>
        </div>
        <hr>

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
                            <form method="POST" action="{{ route('user.contact') }}" >
                                @csrf
                                <div class="app-form">
                                    <div class="app-form-group">
                                        <input class="app-form-control text-dark"  name="name" placeholder="নাম " value="">
                                    </div>
                                    <div class="app-form-group">
                                        <input class="app-form-control text-dark" name="email" placeholder="ইমেইল ">
                                    </div>
                                    <div class="app-form-group">
                                        <input class="app-form-control text-dark" name="mobile" placeholder="মোবাইল ">
                                    </div>
                                    <div class="app-form-group message">
                                        <input class="app-form-control text-dark" name="message" placeholder="ম্যাসেজ ">
                                    </div>
                                    <div class="app-form-group buttons">
                                        <button class=" button-68">বাদ দিন </button>
                                        <button type="submit" class=" button-68">সাবমিট </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </section>

    </div>
@endsection
@section('js')
    <script>

    </script>
@endsection
