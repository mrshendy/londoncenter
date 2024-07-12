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
                    <h1 class="display-3 text-white animated slideInDown">{{ trans('trans_website.categories') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white"
                                    href="{{ url('/' . ($page = 'home')) }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">
                                {{ trans('trans_website.categories') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Start -->
    <div class="row" style="--bs-gutter-x: 0;">
        <div class="col-md-12" style="display: contents;">
            <div class="col-md-4" style="padding: 50px;padding-top: 0px;">
                <article class="leaderboard">
                    <header>
                        <i class="fa fa-search leaderboard__icon"></i>
                        <h1 class="leaderboard__title">
                            <span class="leaderboard__title--top">{{ trans('trans_website.filter') }}</span>
                        </h1>
                    </header>
                    <main class="leaderboard__profiles">
                        <form action="{{ route('courses.filter') }}" method="GET">
                            <input type="text" class="mail" placeholder="{{ trans('trans_website.searchtext') }}" name="name">
                            <input type="text" value="{{$category_id}}" name="category_id" hidden>
                            <input type="submit" value="{{ trans('trans_website.searchbtn') }}" class="subscribe">
                        </form>
                    </main>
                </article>
                <article class="leaderboard filter-dropdown mobile_view2">
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
                                        <img src="{{asset($data->img)}}" alt="{{$data->name}}" class="leaderboard__picture">
                                        <span class="leaderboard__name">{{$data->name}}</span>
                                    </article>
                                </button>
                            </form>
                        @endforeach
                    </main>
                </article>
                 <div class="nav-item dropdown mobile_view">
                    <a href="#" class="nav-link dropdown-toggle subscribe" data-bs-toggle="dropdown" style="text-align: center;color: #fff;">{{ trans('trans_website.categories') }}</a>
                    <div class="dropdown-menu fade-down m-0">
                       @foreach ($category as $data)
                        <a  href="{{ url('/courses/filter?category_id=' . $data->id) }}" class="dropdown-item"><i class="fa fa-certificate"
                                style="color: #da051b;padding-left: 10px;padding-right: 10px;padding-top: 3px;"></i>{{ $data->name }}</a>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="containertable">
                <main class="leaderboard__profiles" style="display: block;padding: 0;">
                    @foreach ($dates as $date)
                            <input type="hidden" name="date" value="{{ $date['original'] }}">
                            <a href="#{{$date['original']}}" type="submit" class="btn btn-primary" style="margin: 5px;">
                                {{ $date['formatted'] }}
                            </a>
                    @endforeach
                </main>
                @foreach ($courses as $month => $monthCourses)
                <div id="{{$month}}">
                    <div  style="border-bottom: 2px solid var(--bs-secondary);align-items: center !important;justify-content: space-between !important;display: flex !important;box-sizing: border-box;margin-bottom: 10px;">
                       <h3  style="font-size: 18px;padding: 10px;">{{ Carbon\Carbon::parse($month . '-01')->locale(App::getLocale())->isoFormat('MMMM YYYY') }}</h3>
                    </div>
                </div>
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-2">{{ trans('trans_website.name') }}</div>
                            <div class="col col-1">{{ trans('trans_website.duration') }}</div>
                            <div class="col col-3">{{ trans('trans_website.date') }}</div>
                            <div class="col col-3">{{ trans('trans_website.Location') }}</div>
                            <div class="col col-4">{{ trans('trans_website.Enroll Now') }}</div>
                        </li>
                        <!-- Courses listing for this month -->
                        @foreach ($monthCourses as $course)
                            <li class="table-row">
                                <div class="col col-2" data-label="{{ trans('trans_website.name') }}">{{ $course->name }}
                                </div>
                                <div class="col col-1" data-label="{{ trans('trans_website.duration') }}">
                                    {{ $course->duration }}</div>
                                <div class="col col-3" data-label="{{ trans('trans_website.date') }}">{{ $course->date }}
                                </div>
                                <div class="col col-3" data-label="{{ trans('trans_website.Location') }}">
                                   {{ $course->place_name }} </div>
                                <div class="col col-4">
                                    <a href="{{ route('detailsCourse.show', ['id' => $course->id]) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3 "> {{ trans('trans_website.Enroll Now') }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
    </div>


@endsection
