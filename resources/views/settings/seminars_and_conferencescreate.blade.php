@extends('layouts.master')
@section('title')
    {{ trans('main_trans.title') }}



@stop


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ trans('settings_trans.settings') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ trans('settings_trans.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('settings_trans.s_and_c_settings') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('s_and_c_settings.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="sorting" class="form-label">{{ trans('settings_trans.sorting') }}</label>
                        <input type="number" class="form-control" id="sorting" name="sorting"
                            placeholder="{{ trans('settings_trans.sorting_enter') }}" >
                    </div>
                    <div class="col-4 mb-3">
                        <label for="name_ar" class="form-label">{{ trans('settings_trans.name_ar') }}</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar"
                            placeholder="{{ trans('settings_trans.name_ar_enter') }}" required>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.name_en') }}</label>
                        <input type="text" class="form-control" id="name_en" name="name_en"
                            placeholder="{{ trans('settings_trans.name_en_enter') }}" required>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="ForminputState" class="form-label">{{ trans('settings_trans.img') }}</label>
                        <input type="file" class="form-control" id="img" name="img"
                            placeholder="{{ trans('settings_trans.img') }}">
                    </div>
                      <div class="col-6 mb-3">
                        <label for="ForminputState" class="form-label">{{ trans('settings_trans.file') }}</label>
                        <input type="file" class="form-control" id="file" name="file"
                            placeholder="{{ trans('settings_trans.file') }}" >
                    </div>
                    <!--<div class="col-4 mb-3 hidden">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.price') }}</label>
                        <input type="text" class="form-control" id="price" name="price"
                            placeholder="{{ trans('settings_trans.price_enter') }}" >
                    </div>-->
                   
                   
                     <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.introduction_ar') }}</label>
                        <textarea class="form-control" id="introduction_ar" name="introduction_ar" rows="4"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.course_content_ar') }}</label>
                        <textarea class="form-control" id="course_content_ar" name="course_content_ar" rows="4"></textarea>
                    </div>
                      <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.introduction_en') }}</label>
                        <textarea class="form-control" id="introduction_en" name="introduction_en" rows="4"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.course_content_en') }}</label>
                        <textarea class="form-control" id="course_content_en" name="course_content_en" rows="4"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ trans('settings_trans.add') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
     <script>
        ClassicEditor
            .create(document.querySelector('#introduction_ar'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#course_content_ar'))
            .catch(error => {
                console.error(error);
            });

             ClassicEditor
            .create(document.querySelector('#introduction_en'))
            .catch(error => {
                console.error(error);
            });

             ClassicEditor
            .create(document.querySelector('#course_content_en'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
