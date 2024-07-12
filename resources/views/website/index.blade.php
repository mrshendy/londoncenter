@extends('layouts_website.master')
@section('title')
    {{ trans('main_trans.title') }}
@stop
@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets_website/img/1.jpg') }}" style="height: 800px;" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown h_panr" style="font-size: 30px;">
                                    {{ trans('trans_website.h1_1') }}</h1>
                                <p class="fs-5 text-white mb-4  mt-3 pb-2 p_panr">{{ trans('trans_website.p_1') }}</p>
                                <a href="{{ url('/' . ($page = 'about')) }}"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">{{ trans('trans_website.read_more') }}</a>
                                <a href="{{ url('/' . ($page = 'contact')) }}"
                                    class="btn btn-light py-md-3 px-md-5 animated slideInRight">{{ trans('trans_website.connect_us') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets_website/img/2.jpg') }}" style="height: 800px;" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">

                                <h1 class="display-3 text-white animated slideInDown h_panr" style="font-size: 30px;">
                                    {{ trans('trans_website.h1_2') }}</h1>
                                <p class="fs-5 text-white mb-4  mt-3 pb-2 p_panr">{{ trans('trans_website.p_2') }}</p>
                                <a href="{{ url('/' . ($page = 'about')) }}"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">{{ trans('trans_website.read_more') }}</a>
                                <a href="{{ url('/' . ($page = 'contact')) }}"
                                    class="btn btn-light py-md-3 px-md-5 animated slideInRight">{{ trans('trans_website.connect_us') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
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
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ $footer_data->about }}
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i
                                    class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about1') }}</p>
                        </div>
                        <div class="col-sm-12">
                            <p class="mb-0"><i
                                    class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about2') }}</p>
                        </div>
                        @if (App::getlocale() == 'en')
                            <div class="col-sm-12">
                                <p class="mb-0"><i
                                        class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about3') }}
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p class="mb-0"><i
                                        class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about4') }}
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p class="mb-0"><i
                                        class="fa fa-arrow-right text-primary me-2"></i>{{ trans('trans_website.about5') }}
                                </p>
                            </div>
                        @endif
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2"
                        href="{{ url('/' . ($page = 'about')) }}">{{ trans('trans_website.read_more') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3 seven">
                        {{ trans('trans_website.categories') }}</h6>
                    <h1 class="mb-5">{{ trans('trans_website.courses_categories') }}</h1>
                </div>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach ($sections as $data)
                    <a href="{{ url('/courses/filter?category_id=' . $data->id) }}">
                        <div class="testimonial-item text-center">
                            <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset($data->img) }}"
                                style="width: 100px !important; height: 100px !important;">
                            <h5  style="color: #000;" class="mb-0">{{ $data->name }}</h5>
                        </div>
                    </a>
                @endforeach
            </div>
            <a class="btn btn-primary py-3 px-5 mt-2"
                href="{{ url('/' . ($page = 'categories')) }}">{{ trans('trans_website.read_more') }}</a>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">{{ trans('trans_website.our_gallery') }}
                </h6>
                <h1 class="mb-5">{{ trans('trans_website.our_gallery_london_centre_training') }}</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach ($gallery as $data)
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" style="height: 350px;width: 350px;" src="{{ asset($data->img) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-calendar-check text-primary mb-4"></i>
                            <h2 style="color: #7d7d7d;font-style: inherit;font-weight: bold;" class="mb-3">20</h2>
                            <p>{{ trans('trans_website.Our experience') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-circle text-primary mb-4"></i>
                            <h2 style="color: #7d7d7d;font-style: inherit;font-weight: bold;" class="mb-3">60</h2>
                            <p>{{ trans('trans_website.Number Of Trainers') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-users text-primary mb-4"></i>
                            <h2 style="color: #7d7d7d;font-style: inherit;font-weight: bold;" class="mb-3">13422</h2>
                            <p>{{ trans('trans_website.Number Of Trainees') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h2 style="color: #7d7d7d;font-style: inherit;font-weight: bold;" class="mb-3">1785</h2>
                            <p>{{ trans('trans_website.Number of courses') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <div class="container-xxl py-5" id="connect_us">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{ trans('trans_website.connect_us') }}
                </h6>
                <h1 class="mb-5 mt-3">{{ trans('trans_website.contact_for_any_query') }}</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>{{ trans('trans_website.get_in_touch') }}</h5>
                    <p class="mb-4  mt-3">{{ trans('trans_website.p_Contact') }}</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ trans('trans_website.Office') }}</h5>
                            <p class="mb-0">{{ $footer_data->address }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ trans('trans_website.phone') }}</h5>
                            <p class="mb-0" style="direction: initial;">{{ $footer_data->phone }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ trans('trans_website.Email') }}</h5>
                            <p class="mb-0">{{ $footer_data->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100" frameborder="0"
                        style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=G2%20Premier%20Business%20Centre,%20London%20NW10%207LQ%20,%20United%20Kingdom.+(London%20Centre%20Training)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                            href="https://www.gps.ie/">gps tracker sport</a>
                    </iframe>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input required type="text" class="form-control" id="name" name="name"
                                        placeholder="{{ trans('trans_website.your_name') }}">
                                    <label for="name">{{ trans('trans_website.your_name') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="{{ trans('trans_website.your_Email') }}">
                                    <label for="email">{{ trans('trans_website.your_Email') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input required type="phone" class="form-control" id="phone" name="phone"
                                        placeholder="{{ trans('trans_website.your_phone') }}">
                                    <label for="email">{{ trans('trans_website.your_phone') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="{{ trans('trans_website.subject') }}">
                                    <label for="subject">{{ trans('trans_website.subject') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea required class="form-control" placeholder="{{ trans('trans_website.message') }}" id="message"
                                        name="message" style="height: 150px"></textarea>
                                    <label for="message">{{ trans('trans_website.message') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3"
                                    type="submit">{{ trans('trans_website.send_message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
