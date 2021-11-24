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
        <hr style="width: 30%">
        <div class="hero_register_btn">
{{--            <a style="font-size: 25px" href={{ route('register') }} class="button-68" >রেজিস্ট্রেশান এর জন্য ক্লিক করুন </a>--}}
            <a class="custom_btn btn_5" href={{ route('register') }} >
                <span>রেজিস্ট্রেশন এর জন্য ক্লিক করুন</span>
            </a>
        </div>



    </div>








{{--    <section class="product-area pd-top-35 mb-5">--}}

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

    <script>
        let modalId = $('#image-gallery');

        $(document)
            .ready(function () {

                loadGallery(true, 'a.thumbnail');

                //This function disables buttons when needed
                function disableButtons(counter_max, counter_current) {
                    $('#show-previous-image, #show-next-image')
                        .show();
                    if (counter_max === counter_current) {
                        $('#show-next-image')
                            .hide();
                    } else if (counter_current === 1) {
                        $('#show-previous-image')
                            .hide();
                    }
                }

                /**
                 *
                 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                 * @param setClickAttr  Sets the attribute for the click handler.
                 */

                function loadGallery(setIDs, setClickAttr) {
                    let current_image,
                        selector,
                        counter = 0;

                    $('#show-next-image, #show-previous-image')
                        .click(function () {
                            if ($(this)
                                .attr('id') === 'show-previous-image') {
                                current_image--;
                            } else {
                                current_image++;
                            }

                            selector = $('[data-image-id="' + current_image + '"]');
                            updateGallery(selector);
                        });

                    function updateGallery(selector) {
                        let $sel = selector;
                        current_image = $sel.data('image-id');
                        $('#image-gallery-title')
                            .text($sel.data('title'));
                        $('#image-gallery-image')
                            .attr('src', $sel.data('image'));
                        $('#image-gallery-image')
                            .attr('style', 'height: 450px');
                        disableButtons(counter, $sel.data('image-id'));
                    }

                    if (setIDs == true) {
                        $('[data-image-id]')
                            .each(function () {
                                counter++;
                                $(this)
                                    .attr('data-image-id', counter);
                            });
                    }
                    $(setClickAttr)
                        .on('click', function () {
                            updateGallery($(this));
                        });
                }
            });

        // build key actions
        $(document)
            .keydown(function (e) {
                switch (e.which) {
                    case 37: // left
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                            $('#show-previous-image')
                                .click();
                        }
                        break;

                    case 39: // right
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                            $('#show-next-image')
                                .click();
                        }
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });

    </script>





@endsection
