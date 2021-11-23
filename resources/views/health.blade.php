@extends('layouts.frontend.desktop.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/desktop/css/fontawesome-all.min.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="mt-5">
            <h2 style="font-weight: 600">স্বাস্থ্য ফোরাম </h2>
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
            <div class="col-md-12 pt-5 text-center">
                <img src="/site_image/WA0004.jpg" alt="Girl in a jacket" width="400" >
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
                                <span>CONTACT</span>
                                <span>US</span>
                            </div>
                            <div class="app-contact">#</div>
                        </div>
                        <div class="screen-body-item">
                            <div class="app-form">
                                <div class="app-form-group">
                                    <input class="app-form-control" placeholder="NAME" value="">
                                </div>
                                <div class="app-form-group">
                                    <input class="app-form-control" placeholder="EMAIL">
                                </div>
                                <div class="app-form-group">
                                    <input class="app-form-control" placeholder="CONTACT NO">
                                </div>
                                <div class="app-form-group message">
                                    <input class="app-form-control" placeholder="MESSAGE">
                                </div>
                                <div class="app-form-group buttons">
                                    <button class="app-form-button">CANCEL</button>
                                    <button class="app-form-button">SEND</button>
                                </div>
                            </div>
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
