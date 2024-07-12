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
                        <li class="breadcrumb-item active">{{ trans('settings_trans.courses_settings') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('general_settings.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.about_ar') }}</label>
                        <textarea class="form-control" id="about_ar" name="about_ar" rows="4">{{$settings->getTranslation('about', 'ar')}}</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.about_en') }}</label>
                        <textarea class="form-control" id="about_en" name="about_en" rows="4">{{$settings->getTranslation('about', 'en')}}</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.objectives_ar') }}</label>
                        <textarea class="form-control" id="objectives_ar" name="objectives_ar" rows="4">{{$settings->getTranslation('objectives', 'ar')}}</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.objectives_en') }}</label>
                        <textarea class="form-control" id="objectives_en" name="objectives_en" rows="4">{{$settings->getTranslation('objectives', 'en')}}</textarea>
                    </div>
                     <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.mission_ar') }}</label>
                        <textarea class="form-control" id="mission_ar" name="mission_ar" rows="4">{{$settings->getTranslation('mission', 'ar')}}</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.mission_en') }}</label>
                        <textarea class="form-control" id="mission_en" name="mission_en" rows="4">{{$settings->getTranslation('mission', 'en')}}</textarea>
                    </div>
                     <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.vision_ar') }}</label>
                        <textarea class="form-control" id="vision_ar" name="vision_ar" rows="4">{{$settings->getTranslation('vision', 'ar')}}</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.vision_en') }}</label>
                        <textarea class="form-control" id="vision_en" name="vision_en" rows="4">{{$settings->getTranslation('vision', 'en')}}</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.address_ar') }}</label>
                          <input type="text" class="form-control" id="address_ar" name="address_ar" value="{{$settings->getTranslation('address', 'ar')}}" placeholder="{{ trans('settings_trans.name_ar_enter') }}" >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.address_en') }}</label>
                        <input type="text" class="form-control" id="address_en" name="address_en" value="{{$settings->getTranslation('address', 'en')}}" placeholder="{{ trans('settings_trans.name_en_enter') }}" >
                    </div>
                      <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.phone') }}</label>
                          <input type="text" class="form-control" id="phone" name="phone" value="{{$settings->phone}}" placeholder="{{ trans('settings_trans.name_ar_enter') }}" >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.email') }}</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$settings->email}}" placeholder="{{ trans('settings_trans.name_en_enter') }}" >
                    </div>
                     <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.facebook') }}</label>
                          <input type="text" class="form-control" id="facebook" value="{{$settings->facebook}}" name="facebook" placeholder="{{ trans('settings_trans.name_ar_enter') }}" >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.twitter') }}</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{$settings->twitter}}" placeholder="{{ trans('settings_trans.name_en_enter') }}" >
                    </div>
                     <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.instagram') }}</label>
                          <input type="text" class="form-control" id="instagram"  value="{{$settings->instagram}}"  name="instagram" placeholder="{{ trans('settings_trans.name_ar_enter') }}" >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.snapchat') }}</label>
                        <input type="text" class="form-control" id="snapchat" name="snapchat"  value="{{$settings->snapchat}}" placeholder="{{ trans('settings_trans.name_en_enter') }}" >
                    </div>
                      <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.linkedIn') }}</label>
                          <input type="text" class="form-control" id="linkedIn" name="linkedIn" value="{{$settings->linkedIn}}"  placeholder="{{ trans('settings_trans.name_ar_enter') }}" >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.whatsApp') }}</label>
                        <input type="text" class="form-control" id="whatsApp" name="whatsApp" value="{{$settings->whatsApp}}" placeholder="{{ trans('settings_trans.name_en_enter') }}" >
                    </div>
                     <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.tiktok') }}</label>
                          <input type="text" class="form-control" id="tiktok" name="tiktok"  value="{{$settings->tiktok}}"  placeholder="{{ trans('settings_trans.name_ar_enter') }}" >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name_en" class="form-label">{{ trans('settings_trans.youtube') }}</label>
                        <input type="text" class="form-control" id="youtube" name="youtube"  value="{{$settings->youtube}}"  placeholder="{{ trans('settings_trans.name_en_enter') }}" >
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ trans('settings_trans.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
