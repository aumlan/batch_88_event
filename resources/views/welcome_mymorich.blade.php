@extends('layouts.frontend.desktop.master')
@section('content')
    <!-- Banner Area Start-->

{{--    @include('layouts.frontend.featured_banner')--}}

    <!-- Banner Area End -->

    <!-- arrival-Area Start-->
    {{-- @include('layouts.frontend.second_featured') --}}
    <!-- arrival-Area End-->

    <!-- product-Area Start-->
    <div class="hearo_section">
        <div class="slider owl-carousel" id="single_slider">
            @foreach ($sliders as $slider)
                <div class="slider_image">
                    <img style="object-fit: fill" src="{{asset($slider->image)}}" alt="">
                </div>
            @endforeach
        </div>
    </div>


    <hr style="width: 75%">

    <section class="product-area text-center pd-top-35">
        <div class="container">
            <div class="row  mb-4 justify-content-center">
                <div class="col-lg-3">
                    <div class="section-title fancy-border">
                        <span class="option_highlight">Top Reacted</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($top_reacted as $prd)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-product-wrap">
                            <div class="thumb">
                                @if (count($prd->productImage) > 0)
                                    <img src="{{ thumbnail($prd->productImage[0]->image) }}" alt="img" width="200px" style="object-fit: contain;width: 100%;height: 100%;}">
                                @endif

                                <a class="btn btn-base bg-main" href="{{ route('product.details', [$prd->id, $prd->slug]) }}"><span class="border-1"></span><span
                                        class="border-2"></span>QUICK VIEW</a>
{{--                                <ul>--}}
{{--                                    <li><a href="#"><i class="far fa-heart"></i></a></li>--}}
{{--                                    <li><a href="#"><img src="{{ asset('FrontendAsset/img/icon/git-compare.png') }}"--}}
{{--                                                         alt="img"></a></li>--}}
{{--                                    <li><a href="#"><img src="{{ asset('FrontendAsset/img/icon/shopping-bag.png') }}"--}}
{{--                                                         alt="img"></a></li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="wrap-details">
                                <span class="categories">{{ $prd->category ? $prd->category->name : '' }}</span>
                                <h6><a
                                        href="{{ route('product.details', [$prd->id, $prd->slug]) }}">
                                        <span style="color: #ff8e01">{{ $prd->name }}</span>
                                    </a>
                                </h6>
                                <div class="star-rating">
                                    <span><i class="la la-star"></i></span>
                                    <span><i class="la la-star"></i></span>
                                    <span><i class="la la-star"></i></span>
                                    <span><i class="la la-star"></i></span>
                                    <span><i class="la la-star"></i></span>
                                </div>
                                <span
                                    class="price">AED{{ $prd->sales_price_aed }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="product-area text-center pd-top-35">
        <div class="container_custom">
            @foreach ($gallery as $g)
                <div class="box_custom">
                    <img src="/images/sliders/{{ $g->image}}">
                    <span>{{ $g->slider_title }}</span>
                </div>
            @endforeach
        </div>
    </section>
{{--    @include('layouts.frontend.third_banner')--}}

    <!-- arrival-Area End-->




{{--    @include('layouts.frontend.desktop.parts.service')--}}

@endsection
@section('js')
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





@endsection
