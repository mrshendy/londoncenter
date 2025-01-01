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
                    <h1 class="display-3 text-white animated slideInDown">
                        {{ trans('trans_website.seminars_and_conferences') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white"
                                    href="{{ url('/' . ($page = 'home')) }}">{{ trans('trans_website.home') }}</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">
                                {{ trans('trans_website.seminars_and_conferences') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- s_and_c Start -->
    <div class="row" style="--bs-gutter-x: 0;">

        <div class="col-md-12">
            <div class="containertable">
                <main class="leaderboard__profiles" style="display: block;padding: 0;">
                    @foreach ($dates as $date)
                        <input type="hidden" name="date" value="{{ $date['original'] }}">
                        <a href="#{{ $date['original'] }}" type="submit" class="btn btn-primary" style="margin: 5px;">
                            {{ $date['formatted'] }}
                        </a>
                    @endforeach
                </main>
                @foreach ($s_and_c as $month => $months_and_c)
                    <div id="{{ $month }}">
                        <div
                            style="border-bottom: 2px solid var(--bs-secondary);align-items: center !important;justify-content: space-between !important;display: flex !important;box-sizing: border-box;margin-bottom: 10px;">
                            <h3 style="font-size: 18px;padding: 10px;">
                                {{ Carbon\Carbon::parse($month . '-01')->locale(App::getLocale())->isoFormat('MMMM YYYY') }}
                            </h3>
                        </div>
                    </div>
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-2">{{ trans('trans_website.seminars_and_conferences') }}</div>
                            <div class="col col-1">{{ trans('trans_website.duration') }}</div>
                            <div class="col col-3">{{ trans('trans_website.date') }}</div>
                            <div class="col col-3">{{ trans('trans_website.Location') }}</div>
                            <div class="col col-4">{{ trans('trans_website.Enroll Now') }}</div>
                        </li>
                        <!-- s_and_c listing for this month -->
                        @foreach ($months_and_c as $s_and_c)
                            <li class="table-row">
                                <div class="col col-2" data-label="{{ trans('trans_website.name') }}">{{ $s_and_c->name }}
                                </div>
                                <div class="col col-1" data-label="{{ trans('trans_website.duration') }}">
                                    {{ $s_and_c->duration }}</div>
                                <div class="col col-3" data-label="{{ trans('trans_website.date') }}">{{ $s_and_c->date }}
                                </div>
                                <div class="col col-3" data-label="{{ trans('trans_website.Location') }}">
                                    {{ $s_and_c->place_name }}</div>
                                <div class="col col-4">
                                    <a href="{{ route('detailss_and_c.show', ['id' => $s_and_c->id]) }}"
                                        class="flex-shrink-0 btn btn-sm btn-primary px-3 ">
                                        {{ trans('trans_website.Enroll Now') }}</a>
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
