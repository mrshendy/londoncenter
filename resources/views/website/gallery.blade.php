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
                    <h1 class="display-3 text-white animated slideInDown">{{ trans('trans_website.our_gallery') }} </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/' . $page='home') }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ trans('trans_website.our_gallery') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
  <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"> {{ trans('trans_website.our_gallery') }}</h6>
                <h1 class="mb-5">{{ trans('trans_website.our_gallery_london_centre_training') }}</h1>
            </div>
            <div class="row g-4 justify-content-center">
                 @foreach ($galleryall as $data)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ url('/courses/filter?category_id=' . $data->id) }}" class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset($data->img) }}" alt="" style="height: 300px;">
                        </div>
                    </a>
                </div>
             @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->


@endsection
