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
                    <h1 class="display-3 text-white animated slideInDown">{{ trans('trans_website.View course details') }}
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white"
                                    href="{{ url('/' . ($page = 'home')) }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item"><a class="text-white">{{ trans('trans_website.categories') }}</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">
                                {{ trans('trans_website.View course details') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="meetings-page" id="meetings" style="padding-top: 0px !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-5" style="padding: 50px;padding-top: 0px;">
                    <article class="leaderboard mobile_view2">
                        <header>
                            <i class="fas fa-user-graduate leaderboard__icon"></i>
                            <h1 class="leaderboard__title">
                                <span class="leaderboard__title--top">{{ trans('trans_website.categories') }}</span>
                            </h1>
                        </header>
                        <main class="leaderboard__profiles">
                            @foreach ($category as $data)
                                <form action="{{ route('courses.filter') }}" method="GET" style="display:inline;">
                                    <input type="hidden" name="category_id" value="{{ $data->id }}">
                                    <button type="submit" name="category" style="width: 100%;">
                                        <article class="leaderboard__profile">
                                            <img src="{{ asset($data->img) }}" alt="{{ $data->name }}"
                                                class="leaderboard__picture">
                                            <span class="leaderboard__name">{{ $data->name }}</span>
                                        </article>
                                    </button>
                                </form>
                            @endforeach
                        </main>
                    </article>
                    <div class="nav-item dropdown mobile_view">
                        <a href="#" class="nav-link dropdown-toggle subscribe" data-bs-toggle="dropdown"
                            style="text-align: center;color: #fff;">{{ trans('trans_website.categories') }}</a>
                        <div class="dropdown-menu fade-down m-0">
                            @foreach ($category as $data)
                                <a href="{{ url('/courses/filter?category_id=' . $data->id) }}" class="dropdown-item"><i
                                        class="fa fa-certificate"
                                        style="color: #da051b;padding-left: 10px;padding-right: 10px;padding-top: 3px;"></i>{{ $data->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="meeting-single-item">
                                <div class="thumb">
                                    <div class="date">
                                        <h6> <span>{{ \Carbon\Carbon::parse($courses->date)->format('d') }}</span>
                                            {{ \Carbon\Carbon::parse($courses->date)->locale(App::getLocale())->isoFormat('MMMM') }}
                                        </h6>
                                    </div>
                                    <a><img src="{{ asset('assets_website/img/1212.jpeg') }}"
                                            style="height: 300px;width: 100%;" alt=""></a>
                                </div>
                                <div class="down-content">
                                    <h4>{{ $courses->name }}</h4>
                                    <p> {{ $courses->sections ? $courses->sections->name : 'No section assigned' }}</p>
                                    <ul class="responsive-table">
                                        <li class="table-header">
                                            <div class="col col-1">{{ trans('trans_website.duration') }}</div>
                                            <div class="col col-3">{{ trans('trans_website.date') }}</div>
                                            <div class="col col-3">{{ trans('trans_website.Location') }}</div>
                                            <div class="col col-4">{{ trans('trans_website.Enroll Now') }}</div>
                                        </li>
                                        <!-- Courses listing for this month -->
                                        @foreach ($courses_details as $details)
                                            <li class="table-row">
                                                <div class="col col-1" data-label="{{ trans('trans_website.duration') }}">
                                                    {{ $details->duration }}</div>
                                                <div class="col col-3" data-label="{{ trans('trans_website.date') }}">
                                                    {{ $details->date }}</div>
                                                <div class="col col-3" data-label="{{ trans('trans_website.Location') }}">
                                                    {{ optional($details->place)->name }}</div>
                                                <div class="col col-4">
                                                    <button id="getValueButton"
                                                        onclick="get_id({{ $details->id }}, '{{ $details->date }}', '{{ $courses->name }}', '{{ optional($details->place)->name }}')"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        class="flex-shrink-0 btn btn-sm btn-primary px-3">
                                                        {{ trans('trans_website.Enroll Now') }}
                                                    </button>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @if ($courses->introduction!="<p>&nbsp;</p>" &&  $courses->introduction)
                                        <div>
                                            <div
                                                style="border-bottom: 2px solid var(--bs-secondary);align-items: center !important;justify-content: space-between !important;display: flex !important;box-sizing: border-box;margin-bottom: 10px;">
                                                <h3 style="font-size: 18px;padding: 10px;">
                                                    {{ trans('trans_website.introduction') }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="description">
                                            {!! $courses->introduction !!}
                                        </div>
                                    @endif
                                    @if ($courses->course_content!="<p>&nbsp;</p>" &&  $courses->introduction)
                                        <div>
                                            <div
                                                style="border-bottom: 2px solid var(--bs-secondary);align-items: center !important;justify-content: space-between !important;display: flex !important;box-sizing: border-box;margin-bottom: 10px;">
                                                <h3 style="font-size: 18px;padding: 10px;">
                                                    {{ trans('trans_website.description') }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="description">
                                            {!! $courses->course_content !!}
                                        </div>
                                    @endif
                                    @if ($courses->file)
                                        <div>
                                            <div
                                                style="border-bottom: 2px solid var(--bs-secondary);align-items: center !important;justify-content: space-between !important;display: flex !important;box-sizing: border-box;margin-bottom: 10px;">
                                                <h3 style="font-size: 18px;padding: 10px;">
                                                    {{ trans('trans_website.Download the program book') }}
                                                </h3>
                                            </div>
                                        </div>
                                        <a class=" btn btn-primary" target="_blank"
                                            href="{{ asset($courses->file) }}">{{ trans('trans_website.show file') }}</a>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Courses Start -->

    <!-- Courses End -->


    <!-- Testimonial Start -->

    <!-- Testimonial End -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('trans_website.send_request') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('join_request.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <input type="hidden" id="id_courses_details" name="id_courses_details" />
                            <input type="hidden" id="name_courses_details" name="name_courses_details" />
                            <input type="hidden" id="date_courses_details" name="date_courses_details" />
                            <input type="hidden" id="place_courses_details" name="place_courses_details" />


                            <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                                placeholder="{{ trans('trans_website.your_name') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="phone"
                                placeholder="{{ trans('trans_website.your_phone') }}">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                style="direction: inherit;" name="email"
                                placeholder="{{ trans('trans_website.your_Email') }}">
                        </div>
                        <div class="mb-3">
                            <textarea required class="form-control" placeholder="{{ trans('trans_website.message') }}" id="notes"
                                name="notes" style="height: 150px"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ trans('trans_website.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('trans_website.save') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function get_id(id, date, name, place) {
            // تحديث القيم في الحقول المدخلة
            document.getElementById('date_courses_details').value = date;
            document.getElementById('id_courses_details').value = id;
            document.getElementById('name_courses_details').value = name;
            document.getElementById('place_courses_details').value = place;

        }
    </script>



@endsection
