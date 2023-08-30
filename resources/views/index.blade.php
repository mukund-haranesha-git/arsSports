@extends('layouts.app')
@section('content')
    @if(!empty($banner) && count($banner) > 0)
        <section id="home" class="divider">
            <div class="container-fluid p-0">
                <!-- Slider Revolution Start -->
                <div class="rev_slider_wrapper">
                    <div class="rev_slider" data-version="5.0">
                        <ul>
                            @foreach($banner as $list)
                                <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{url($list['image'])}}" data-rotate="0" data-saveperformance="off" data-title="Web Show" data-description="">
                                    <img src="{{url($list['image'])}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                    <div class="tp-caption tp-resizeme text-center text-white font-raleway bg-dark-transparent pl-30 pr-30 border-theme-colored" id="rs-1-layer-1" data-x="['right']" data-hoffset="['30']" data-y="['middle']" data-voffset="['-40'']" data-fontsize="['64','64','54','24']" data-lineheight="['90']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;s:500" data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;" data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1400" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 5; white-space: nowrap; font-weight:600; border-right: 6px solid;">{{$list['title_text']}} </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <script>
                    $(document).ready(function(e) {
                        var revapi = $(".rev_slider").revolution({
                            sliderType: "standard",
                            jsFileLocation: "{{ URL::asset('website/assets/js/revolution-slider/js/')}}",
                            sliderLayout: "auto",
                            dottedOverlay: "none",
                            delay: 5000,
                            navigation: {
                                keyboardNavigation: "off",
                                keyboard_direction: "horizontal",
                                mouseScrollNavigation: "off",
                                onHoverStop: "off",
                                touch: {
                                    touchenabled: "on",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                },
                                arrows: {
                                    style: "gyges",
                                    enable: true,
                                    hide_onmobile: false,
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    tmp: "",
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    }
                                },
                                bullets: {
                                    enable: true,
                                    hide_onmobile: true,
                                    hide_under: 800,
                                    style: "hebe",
                                    hide_onleave: false,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    h_offset: 0,
                                    v_offset: 30,
                                    space: 5,
                                    tmp: "<span class = 'tp-bullet-image'> </span> <span class = 'tp-bullet-imageoverlay'> </span> <span class = 'tp-bullet-title'> </span>"
                                }
                            },
                            responsiveLevels: [1240, 1024, 778],
                            visibilityLevels: [1240, 1024, 778],
                            gridwidth: [1170, 1024, 778, 480],
                            gridheight: [720, 768, 960, 720],
                            lazyType: "none",
                            parallax: "mouse",
                            parallaxBgFreeze: "off",
                            parallaxLevels: [2, 3, 4, 5, 6, 7, 8, 9, 10, 1],
                            shadow: 0,
                            spinner: "off",
                            stopLoop: "on",
                            stopAfterLoops: 0,
                            stopAtSlide: 1,
                            shuffle: "off",
                            autoHeight: "off",
                            fullScreenAutoWidth: "off",
                            fullScreenAlignForce: "off",
                            fullScreenOffsetContainer: "",
                            fullScreenOffset: "0",
                            hideThumbsOnMobile: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                nextSlideOnWindowFocus: "off",
                                disableFocusListener: false,
                            }
                        });
                    });
                </script>
            </div>
        </section>
    @endif
      <!-- Section: About -->
    <section id="about" class="bg-lighter">
        <div class="container pb-70">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="title text-uppercase">Welcome to <span class="font-weight-300">ARS Sports</span></h2>
                        <p class="text-uppercase text-white letter-space-1">
                            Customised bats are a game-changer for cricketers. Tailored to individual preferences, these bats offer the perfect balance, weight and grip, enhancing performance on the field. Personalised designs and willow grade allow players to unleash their full potential, making customised bats a valuable asset for anyone serious about excelling in the game
                        </p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fullwidth" src="{{ URL::asset('website/assets/images/about/bat4.jpg')}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="events-venue border-theme-colored p-40 pt-0 mt-50 ml-sm-0 mt-sm-0 mt-xs-0 pt-sm-80" data-margin-left="-60px">
                            <h2 class="events-trainer-title text-uppercase letter-space-1 text-center text-theme-colored bg-lighter mb-20">
                                We are customizable
                            </h2>
                            <div class="text-white pl-50 pl-sm-0 mb-20">
                                <p>Finding the correct bat is a challenge & we understand that</p>
                                <p>That’s why we value your needs</p>
                                <p>We, as ARS are here to help & fulfil all your requests</p>
                                <p>Our blend of craftsmanship & high-end technology constitutes the core strength of our company</p>
                                <p>At ARS we give you the opportunity to craft your own cricket bat !</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-40">
                    <div class="col-md-6">
                        <div class="events-venue border-theme-colored p-40 pt-0 mt-50 ml-sm-0 mt-sm-0 mt-xs-0 pt-sm-80" data-margin-left="-60px">
                            <div>
                                <h2 class="events-trainer-title text-uppercase letter-space-1 text-center text-theme-colored bg-lighter mb-20">
                                    Customised Cricket Bat
                                </h2>
                            </div>
                            <div class="text-white pl-50 pl-sm-0 mb-20">
                                <p>You can customise and order your bespoke
                                    English Willow Cricket Bat on our website.
                                    Kindly give it a try.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fullwidth" src="{{ URL::asset('website/assets/images/about/bat5.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
