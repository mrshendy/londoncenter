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
                        <li class="breadcrumb-item active">{{ trans('settings_trans.Place_settings') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ trans('settings_trans.Place_settings') }}</h5>
                    {{-- Message --}}
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Success !</strong> {{ session('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Error !</strong> {{ session('error') }}
                        </div>
                    @endif

                </div>


                <!-- Buttons Grid -->
                <div class="d-grid gap-2">
                    <button data-bs-toggle="modal" data-bs-target="#signupModals"
                        class="btn btn-primary waves-effect waves-light"
                        type="button">{{ trans('settings_trans.add') }}</button>
                </div>


                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th data-ordering="false">{{ trans('settings_trans.sr_no') }}</th>
                                <th data-ordering="false">{{ trans('settings_trans.id') }}</th>
                                <th data-ordering="false">{{ trans('settings_trans.name_ar') }}</th>
                                <th data-ordering="false">{{ trans('settings_trans.name_en') }}</th>
                                <th data-ordering="false">{{ trans('settings_trans.status') }}</th>
                                <th>{{ trans('settings_trans.create_date') }}</th>
                                <th>{{ trans('settings_trans.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($place as $data)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->getTranslation('name', 'ar') }}</td>
                                    <td>{{ $data->getTranslation('name', 'en') }}</td>
                                    </td>
                                    <td>
                                        @if ($data->status == 1)
                                            <span class="badge badge-label bg-success"><i class="mdi mdi-circle-medium"></i>
                                                {{ trans('settings_trans.default_true') }}</span>
                                        @endif
                                        @if ($data->status == 0)
                                            <span class="badge badge-label bg-warning"><i class="mdi mdi-circle-medium"></i>
                                                {{ trans('settings_trans.default_false') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><button data-bs-toggle="modal"
                                                        data-bs-target="#signupModals{{ $data->id }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</button></li>
                                                <li><button data-bs-toggle="modal"
                                                        data-bs-target="#signupModal{{ $data->id }}"
                                                        class="dropdown-item edit-item-btn"> <i
                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete</button></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- edit -->
                                <div id="signupModals{{ $data->id }}" class="modal fade" tabindex="-1"
                                    aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 overflow-hidden">
                                            <div class="modal-header p-3">
                                                <h4 class="card-title mb-0">{{ trans('settings_trans.update_Countries') }}
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('place_settings.update', 'test') }}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name_ar"
                                                            class="form-label">{{ trans('settings_trans.name_ar') }}</label>
                                                        <input type="text" class="form-control" id="name_ar"
                                                            name="name_ar"
                                                            value="{{ $data->getTranslation('name', 'ar') }}">
                                                        <input class="form-control" id="id" name="id"
                                                            value="{{ $data->id }}" type="hidden">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_en"
                                                            class="form-label">{{ trans('settings_trans.name_en') }}</label>
                                                        <input type="text" class="form-control" id="name_en"
                                                            name="name_en"
                                                            value="{{ $data->getTranslation('name', 'en') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default"
                                                            class="form-label">{{ trans('settings_trans.status') }}</label>
                                                        <select name="status" id="statusf" class="form-control"
                                                            required>
                                                            <option value="1"
                                                                @if ($data->status == 1) selected @endif>
                                                                {{ trans('settings_trans.default_true') }}</option>
                                                            <option value="0"
                                                                @if ($data->status == 0) selected @endif>
                                                                {{ trans('settings_trans.default_false') }}</option>
                                                        </select>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ trans('settings_trans.submit') }}</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="signupModal{{ $data->id }}" class="modal fade" tabindex="-1"
                                    aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 overflow-hidden">
                                            <div class="modal-header p-3">
                                                <h4 class="card-title mb-0">
                                                    {{ trans('settings_trans.massagedelete_data') }}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center p-5">
                                                <lord-icon src="{{ URL::asset('assets/images/icon/tdrtiskw.json') }}"
                                                    trigger="loop" colors="primary:#f7b84b,secondary:#405189"
                                                    style="width:130px;height:130px">
                                                </lord-icon>
                                                <div class="mt-4 pt-4">
                                                    <h4>{{ trans('settings_trans.massagedelete_d') }}!</h4>
                                                    <p class="text-muted">
                                                        {{ trans('settings_trans.massagedelete_p') }}{{ $data->name }}
                                                    </p>
                                                    <!-- Toogle to second dialog -->
                                                    <form action="{{ route('place_settings.destroy', 'test') }}"
                                                        method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <input class="form-control" id="id" name="id"
                                                            value="{{ $data->id }}" type="hidden">

                                                        <button class="btn btn-warning" data-bs-target="#secondmodal"
                                                            data-bs-toggle="modal" data-bs-dismiss="modal">
                                                            {{ trans('settings_trans.massagedelete_data') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="signupModals" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 overflow-hidden">
                <div class="modal-header p-3">
                    <h4 class="card-title mb-0">{{ trans('settings_trans.add') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('place_settings.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">{{ trans('settings_trans.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar"
                                placeholder="{{ trans('settings_trans.name_ar_enter') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name_en" class="form-label">{{ trans('settings_trans.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en"
                                placeholder="{{ trans('settings_trans.name_en_enter') }}" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">{{ trans('settings_trans.add') }}</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
