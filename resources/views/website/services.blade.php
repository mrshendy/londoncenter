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
                    <h1 class="display-3 text-white animated slideInDown">{{ trans('trans_website.services') }} </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/' . $page='home') }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ trans('trans_website.services') }}</li>
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
                            <i class="fa fa-3x fa-solid fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.General courses') }} </h5>
                            <p>{{ trans('trans_website.General courses p') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x  fas fa-pencil-ruler text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.Designed courses') }} </h5>
                            <p>{{ trans('trans_website.Designed courses p') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                     <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x  fas fa-sitemap text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.Internal training') }} </h5>
                            <p>{{ trans('trans_website.Internal training p') }}</p>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                     <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fas fa-user-tie text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.Scientific and professional seminars') }} </h5>
                            <p>{{ trans('trans_website.Scientific and professional seminars p') }}</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                     <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x  fas fa-hotel text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.Specialized conferences') }} </h5>
                            <p>{{ trans('trans_website.Specialized conferences p') }}</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                     <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x  fas fa-tasks text-primary mb-4"></i>
                            <h5 class="mb-3">{{ trans('trans_website.Management consulting') }} </h5>
                            <p>{{ trans('trans_website.Management consulting p') }}</p>
                            <p>{{ trans('trans_website.Management consulting p2') }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->




@endsection
