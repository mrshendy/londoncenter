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
                    <h1 class="display-3 text-white animated slideInDown">{{ trans('trans_website.connect_us') }} </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/' . $page='home') }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ trans('trans_website.connect_us') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

  
  <!-- Testimonial End -->
    <div class="container-xxl py-5" id="connect_us">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{ trans('trans_website.connect_us') }}</h6>
                <h1 class="mb-5">{{ trans('trans_website.contact_for_any_query') }}</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>{{ trans('trans_website.get_in_touch') }}</h5>
                    <p class="mb-4">{{ trans('trans_website.p_Contact') }}</p>
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
                            <p class="mb-0">{{ $footer_data->phone }}</p>
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
                    <iframe class="position-relative rounded w-100 h-100" frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=G2%20Premier%20Business%20Centre,%20London%20NW10%207LQ%20,%20United%20Kingdom.+(London%20Centre%20Training)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps tracker sport</a>
                    </iframe>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input required type="text" class="form-control" id="name" name="name" placeholder="{{ trans('trans_website.your_name') }}">
                                    <label for="name">{{ trans('trans_website.your_name') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="email" class="form-control" id="email" name="email" placeholder="{{ trans('trans_website.your_Email') }}">
                                    <label for="email">{{ trans('trans_website.your_Email') }}</label>
                                </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-floating">
                                    <input required type="phone" class="form-control" id="phone" name="phone" placeholder="{{ trans('trans_website.your_phone') }}">
                                    <label for="email">{{ trans('trans_website.your_phone') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="{{ trans('trans_website.subject') }}">
                                    <label for="subject">{{ trans('trans_website.subject') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea required class="form-control" placeholder="{{ trans('trans_website.message') }}" id="message" name="message" style="height: 150px"></textarea>
                                    <label for="message">{{ trans('trans_website.message') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">{{ trans('trans_website.send_message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
