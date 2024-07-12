<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets_website/img/Logo.png') }}" style="width: 200px;" />
            <!--<h2 class="m-0 text-primary" style="font-size: 16px;">
                London Centre
                <br /> Training
            </h2>-->
        </div>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav  p-4 p-lg-0 ms-autoweb">
            <a href="{{ url('/' . ($page = 'home')) }}"
                class="nav-item nav-link font @if (Route::currentRouteName() == 'home.index') active @endif">{{ trans('trans_website.home') }}</a>
            <div class="nav-item dropdown mobile_view">
                <a href="#" class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown">{{ trans('trans_website.categories') }}</a>
                <div class="dropdown-menu fade-down m-0">
                    @foreach ($category as $data)
                        <a href="{{ url('/courses/filter?category_id=' . $data->id) }}" class="dropdown-item"><i
                                class="fa fa-certificate"
                                style="color: #da051b;padding-left: 10px;padding-right: 10px;padding-top: 3px;"></i>{{ $data->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="dropdown mobile_view2">
                <button
                    class="nav-item nav-link @if (Route::currentRouteName() == 'categories.index') active @endif">{{ trans('trans_website.categories') }}</button>
                <div class="dropdown-options">
                    @foreach ($category as $data)
                        <a href="{{ url('/courses/filter?category_id=' . $data->id) }}"><i class="fa fa-certificate"
                                style="color: #da051b;padding-left: 10px;padding-right: 10px;padding-top: 3px;"></i>{{ $data->name }}</a>
                    @endforeach
                </div>
            </div>

            <a href="{{ url('/' . ($page = 'services')) }}"
                class="nav-item nav-link @if (Route::currentRouteName() == 'services.index') active @endif">{{ trans('trans_website.services') }}</a>
            <a href="{{ url('/' . ($page = 'about')) }}"
                class="nav-item nav-link @if (Route::currentRouteName() == 'about.index') active @endif">
                {{ trans('trans_website.about') }}</a>

            @if (App::getlocale() == 'ar')
                <a hreflang="{{ $localeCode = 'en' }}" style="color: #333"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode = 'en', null, [], true) }}"
                    class="nav-item nav-link" rel="alternate">{{ trans('trans_website.english') }}</a>
            @endif
            @if (App::getlocale() == 'en')
                <a hreflang="{{ $localeCode = 'ar' }}" style="color: #333"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode = 'ar', null, [], true) }}"
                    class="nav-item nav-link font" rel="alternate">
                    {{ trans('trans_website.arabic') }}</a>
            @endif

        </div>
    </div>
    <a href="{{ url('/' . ($page = 'contact')) }}"
        class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">{{ trans('trans_website.connect_us') }}<i
            class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
<a href="{{$footer_data->whatsApp}}" class="float"
    target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>
