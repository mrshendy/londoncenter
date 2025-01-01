<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">{{ trans('trans_website.Quick Link') }}</h4>
                <a class="btn btn-link"  href="{{ url('/' . $page='home') }}">{{ trans('trans_website.home') }}</a>
                <a class="btn btn-link"  href="{{ url('/' . $page='services') }}">{{ trans('trans_website.services') }}</a>
                <a class="btn btn-link"  href="{{ url('/' . $page='about') }}">{{ trans('trans_website.about') }}</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">{{ trans('trans_website.connect_us') }}</h4>
                <div style="display: -webkit-inline-box;">
                    <i class="fa fa-map-marker-alt me-3"></i>
                    <p class="mb-2" style="text-align: start;">{{ $footer_data->address }}</p>
                </div>
                <p class="mb-2" style="text-align: start;"><i class="fa fa-phone-alt me-3"></i>{{ $footer_data->phone }}</p>
                <p class="mb-2" style="text-align: start;"><i class="fa fa-envelope me-3"></i>{{ $footer_data->email }}</p>
                <div class="d-flex pt-2">
                    @if ($footer_data->twitter)
                        <a class="btn btn-outline-light btn-social" target="_block" href="{{$footer_data->twitter}}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if ($footer_data->facebook)
                        <a class="btn btn-outline-light btn-social" target="_block" href="{{$footer_data->facebook}}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if ($footer_data->youtube)
                        <a class="btn btn-outline-light btn-social" target="_block" href="{{$footer_data->youtube}}"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if ($footer_data->linkedIn)
                        <a class="btn btn-outline-light btn-social" target="_block" href="{{$footer_data->linkedIn}}"><i
                                class="fab fa-linkedin-in"></i></a>
                    @endif
                   @if ($footer_data->whatsApp)
                        <a class="btn btn-outline-light btn-social" target="_block" href="{{$footer_data->whatsApp}}"><i class="fab fa-whatsapp-square"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">{{ trans('trans_website.our_gallery') }}</h4>
                <div class="row g-2 pt-2">
                    @foreach ($gallery as $data)
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset($data->img) }}" alt="" style="height: 100px;">
                        </div>
                    @endforeach
                  
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">London Centre Training</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom">EGYSOFY</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ url('/' . $page='home') }}">{{ trans('trans_website.home') }}</a>
                        <a href="{{ url('/' . $page='services') }}" style="border-right: 1px solid;border-left: 1px solid;margin: 15px;padding-left: 15px;padding-right: 15px;">{{ trans('trans_website.services') }}</a>
                        <a href="{{ url('/' . $page='about') }}">{{ trans('trans_website.about') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
