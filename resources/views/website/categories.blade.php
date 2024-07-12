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
                    <h1 class="display-3 text-white animated slideInDown">{{ trans('trans_website.categories') }} </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/' . $page='home') }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ trans('trans_website.categories') }}</li>
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
                <h6 class="section-title bg-white text-center text-primary px-3"> {{ trans('trans_website.categories') }}</h6>
                <h1 class="mb-5">{{ trans('trans_website.courses_categories') }}</h1>
            </div>
            <div class="row g-4 justify-content-center">
                 @foreach ($sections as $data)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ url('/courses/filter?category_id=' . $data->id) }}" class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset($data->img) }}" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="{{ url('/' . ($page = 'home')) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" >{{ trans('trans_website.home') }}</a>
                                <a href="{{ url('/courses/filter?category_id=' . $data->id) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end1" >{{ trans('trans_website.show_courses') }}</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0" style="padding: 0.5rem !important;">
                            <h5 class="mb-4" style="font-size: 25px;">{{$data->name}}</h5>
                        </div>
                       
                    </a>
                </div>
             @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->


@endsection
