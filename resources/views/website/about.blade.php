@extends('layouts_website.master')
@section('title')
    {{ trans('main_trans.title') }}
@stop
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ trans('trans_website.about') }} </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white"
                                    href="{{ url('/' . ($page = 'home')) }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">
                                {{ trans('trans_website.about') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.objectives') }} </h5>
                            <p>{{ $footer_data->objectives }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3"> {{ trans('trans_website.mission') }}</h5>
                            <p>{{ $footer_data->mission }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.vision') }} </h5>
                            <p>{{ $footer_data->vision }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100"
                             src="{{ asset('assets_website/img/about.jpg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">{{ trans('trans_website.about') }}
                    </h6>
                    <h1 class="mb-4">{{ trans('trans_website.Welcome_to_london_centre_training') }}</h1>
                    <div class="row gy-2 gx-4 mb-4">
                         <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ $footer_data->about }}</p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about1') }}</p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about2') }}</p>
                        </div>
                         @if (App::getlocale() == 'en')
                            <div class="col-sm-12">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about3') }}</p>
                            </div>
                            <div class="col-sm-12">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about4') }}</p>
                            </div>
                             <div class="col-sm-12">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about5') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- About End -->



    @endsection
