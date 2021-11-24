@extends('layouts.frontend.mobile.master')
@section('content')
    @include('layouts.frontend.mobile.parts.app_bar')
    <div class="hearo_section">
        <div class="slider owl-carousel" id="single_slider">
            @foreach ($sliders as $slider)
                <div class="slider_image">
                    <img style="object-fit: fill;width: 100%;height: 250px" src="{{asset($slider->image)}}" alt="" >
                </div>
            @endforeach
        </div>
        <div class="hero_register_btn">
{{--            <a  href={{ route('register') }} class="button-68" style="font-size: 11px">রেজিস্ট্রেশান এর জন্য ক্লিক করুন </a>--}}
            <a class="custom_btn btn_5" href={{ route('register') }} >
                <span>রেজিস্ট্রেশন এর জন্য ক্লিক করুন</span>
            </a>
        </div>

    </div>



{{--    <section class="product-area pd-top-35 mt-5 mb-4">--}}

{{--        <div class="container">--}}
{{--            --}}{{--            <div class="row  mb-4 justify-content-center">--}}
{{--            --}}{{--                <div class="col-lg-3">--}}
{{--            --}}{{--                    <div class="section-title fancy-border">--}}
{{--            --}}{{--                        <span class="option_highlight">Contact Us</span>--}}
{{--            --}}{{--                    </div>--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--            </div>--}}
{{--            <div class="screen">--}}

{{--                <div class="screen-body">--}}
{{--                    <div class="screen-body-item left">--}}
{{--                        <div class="app-title">--}}
{{--                            <span style="color: green">যোগাযোগ </span>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="screen-body-item">--}}
{{--                        <div class="app-form">--}}
{{--                            <div class="app-form-group">--}}
{{--                                <input class="app-form-control text-dark" placeholder="নাম " value="">--}}
{{--                            </div>--}}
{{--                            <div class="app-form-group">--}}
{{--                                <input class="app-form-control text-dark" placeholder="ইমেইল ">--}}
{{--                            </div>--}}
{{--                            <div class="app-form-group">--}}
{{--                                <input class="app-form-control text-dark" placeholder="মোবাইল ">--}}
{{--                            </div>--}}
{{--                            <div class="app-form-group message">--}}
{{--                                <input class="app-form-control text-dark" placeholder="ম্যাসেজ ">--}}
{{--                            </div>--}}
{{--                            <div class="app-form-group buttons">--}}
{{--                                <button class=" button-68">বাদ দিন </button>--}}
{{--                                <button class=" button-68">সাবমিট </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </section>--}}

@endsection
@push('js')
    <script>
        $('.Searchbox__keyword__input').keyup(function() {
            let typeInput = $('.Searchbox__keyword__input').val();

        });
    </script>

    <script>
        $(document).ready(function() {

            $(".owl-carousel#single_slider").owlCarousel({
                loop: true,
                margin: 0,
                items: 1,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    766: {
                        items: 1
                    },
                    767: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
        });
    </script>


@endpush
