@extends('layouts.master')
@section('title')
{{ trans('main_trans.title') }}
@stop


@section('content')

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font">{{ trans('settings_trans.settings') }}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ trans('settings_trans.settings') }}</a></li>
                                        <li class="breadcrumb-item active">{{ trans('settings_trans.system_settings') }}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xxl-4 col-lg-6">
                                    <div class="card card-body text-center">
                                        <div class="avatar-md mx-auto mb-3">
                                            <div class="avatar-title bg-soft-light  border border-info p-2 text-success  rounded">
                                                <script src="{{URL::asset('assets/images/icon/bhenfmcm.js')}}"></script>
                                                <lord-icon
                                                    src="{{URL::asset('assets/images/icon/oqhlhtfq.json')}}"
                                                    trigger="loop"
                                                    delay="500"
                                                    colors="primary:#4bb3fd,secondary:#ebe6ef"
                                                    style="width:250px;height:250px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                        <h4 class="card-title font font">{{ trans('settings_trans.sections_settings') }}</h4>
                                        <a  href="{{ url('/' . $page='sections_settings') }}" class="btn btn-info">{{ trans('settings_trans.Go_to_settings_now') }}</a>
                                    </div>
                                </div><!-- end col -->
                                <!-- end col -->
                                
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="card card-body text-center">
                                        <div class="avatar-md mx-auto mb-3">
                                            <div class="avatar-title bg-soft-light  border border-info p-2 text-success  rounded">
                                                <script src="{{URL::asset('assets/images/icon/bhenfmcm.js')}}"></script>
                                                <lord-icon
                                                    src="{{URL::asset('assets/images/icon/oqhlhtfq.json')}}"
                                                    trigger="loop"
                                                    delay="500"
                                                    colors="primary:#4bb3fd,secondary:#ebe6ef"
                                                    style="width:250px;height:250px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                        <h4 class="card-title font font">{{ trans('settings_trans.courses_settings') }}</h4>
                                        <a  href="{{ url('/' . $page='courses_settings') }}" class="btn btn-info">{{ trans('settings_trans.Go_to_settings_now') }}</a>
                                    </div>
                                </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="card card-body text-center">
                                        <div class="avatar-md mx-auto mb-3">
                                            <div class="avatar-title bg-soft-light  border border-info p-2 text-success  rounded">
                                                <script src="{{URL::asset('assets/images/icon/bhenfmcm.js')}}"></script>
                                                <lord-icon
                                                    src="{{URL::asset('assets/images/icon/oqhlhtfq.json')}}"
                                                    trigger="loop"
                                                    delay="500"
                                                    colors="primary:#4bb3fd,secondary:#ebe6ef"
                                                    style="width:250px;height:250px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                        <h4 class="card-title font font">{{ trans('settings_trans.Place_settings') }}</h4>
                                        <a  href="{{ url('/' . $page='place_settings') }}" class="btn btn-info">{{ trans('settings_trans.Go_to_settings_now') }}</a>
                                    </div>
                                </div>
                                
                               <div class="col-xxl-4 col-lg-6">
                                    <div class="card card-body text-center">
                                        <div class="avatar-md mx-auto mb-3">
                                            <div class="avatar-title bg-soft-light  border border-info p-2 text-success  rounded">
                                                <script src="{{URL::asset('assets/images/icon/bhenfmcm.js')}}"></script>
                                                <lord-icon
                                                src="{{URL::asset('assets/images/icon/nnbhwnej.json')}}"
                                                trigger="loop"
                                                delay="500"
                                                colors="primary:#646e78"
                                                style="width:250px;height:250px">
                                            </lord-icon>
                                            </div>
                                        </div>
                                        <h4 class="card-title font">{{ trans('settings_trans.general_settings') }}</h4>
                                        <a href="{{ url('/' . $page='general_settings') }}" class="btn btn-info">{{ trans('settings_trans.Go_to_settings_now') }}</a>
                                    </div>
                                </div>
                                     
                               <div class="col-xxl-4 col-lg-6">
                                    <div class="card card-body text-center">
                                        <div class="avatar-md mx-auto mb-3">
                                            <div class="avatar-title bg-soft-light  border border-info p-2 text-success  rounded">
                                                <script src="{{URL::asset('assets/images/icon/bhenfmcm.js')}}"></script>
                                                <lord-icon
                                                src="{{URL::asset('assets/images/icon/nnbhwnej.json')}}"
                                                trigger="loop"
                                                delay="500"
                                                colors="primary:#646e78"
                                                style="width:250px;height:250px">
                                            </lord-icon>
                                            </div>
                                        </div>
                                        <h4 class="card-title font">{{ trans('settings_trans.gallery_settings') }}</h4>
                                        <a href="{{ url('/' . $page='gallery_settings') }}" class="btn btn-info">{{ trans('settings_trans.Go_to_settings_now') }}</a>
                                    </div>
                                </div>
                                <!-- end col -->
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="card card-body text-center">
                                        <div class="avatar-md mx-auto mb-3">
                                            <div class="avatar-title bg-soft-light  border border-info p-2 text-success  rounded">
                                                <script src="{{URL::asset('assets/images/icon/bhenfmcm.js')}}"></script>
                                                <lord-icon
                                                src="{{URL::asset('assets/images/icon/nnbhwnej.json')}}"
                                                trigger="loop"
                                                delay="500"
                                                colors="primary:#646e78"
                                                style="width:250px;height:250px">
                                            </lord-icon>
                                            </div>
                                        </div>
                                        <h4 class="card-title font">{{ trans('settings_trans.seminars_and_conferences') }}</h4>
                                        <a href="{{ url('/' . $page='s_and_c_settings') }}" class="btn btn-info">{{ trans('settings_trans.Go_to_settings_now') }}</a>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->
                    </div><!-- end row -->
              
    
@endsection
