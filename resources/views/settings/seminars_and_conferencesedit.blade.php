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
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-customs nav-danger mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#border-navs-home"
                                    role="tab">{{ trans('settings_trans.s_and_c_data') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#border-navs-profile"
                                    role="tab">{{ trans('settings_trans.s_and_c_ditils') }}</a>
                            </li>
                        </ul><!-- Tab panes -->
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="border-navs-home" role="tabpanel">
                                <form action="{{ route('s_and_c_settings.update', 'test') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ method_field('patch') }}
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="default"
                                                class="form-label">{{ trans('settings_trans.status') }}</label>
                                            <select name="status" id="statusf" class="form-control" required>
                                                <option value="1" @if ($s_and_c->status == 1) selected @endif>
                                                    {{ trans('settings_trans.default_true') }}</option>
                                                <option value="0" @if ($s_and_c->status == 0) selected @endif>
                                                    {{ trans('settings_trans.default_false') }}</option>
                                            </select>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label for="sorting"
                                                class="form-label">{{ trans('settings_trans.sorting') }}</label>
                                            <input type="number" class="form-control" id="sorting" name="sorting"
                                                value="{{ $s_and_c->sorting }}"
                                                placeholder="{{ trans('settings_trans.sorting_enter') }}">
                                            <input type="number" class="form-control" id="id" name="id"
                                                value="{{ $s_and_c->id }}"hidden>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="name_ar"
                                                class="form-label">{{ trans('settings_trans.name_ar') }}</label>
                                            <input type="text" class="form-control" id="name_ar" name="name_ar"
                                                value="{{ $s_and_c->getTranslation('name', 'ar') }}"
                                                placeholder="{{ trans('settings_trans.name_ar_enter') }}" required>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="name_en"
                                                class="form-label">{{ trans('settings_trans.name_en') }}</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en"
                                                value="{{ $s_and_c->getTranslation('name', 'en') }}"
                                                placeholder="{{ trans('settings_trans.name_en_enter') }}" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label for="ForminputState"
                                                class="form-label">{{ trans('settings_trans.img') }}</label>
                                            <input type="file" class="form-control" id="img" name="img"
                                                placeholder="{{ trans('settings_trans.img') }}">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="ForminputState"
                                                class="form-label">{{ trans('settings_trans.file') }}</label>
                                            <input type="file" class="form-control" id="file" name="file"
                                                placeholder="{{ trans('settings_trans.file') }}">
                                        </div>
                                     
                                        <div class="col-6 mb-3">
                                            <label for="name_en"
                                                class="form-label">{{ trans('settings_trans.introduction_ar') }}</label>
                                            <textarea class="form-control" id="introduction_ar" name="introduction_ar" rows="4">{{ $s_and_c->getTranslation('introduction', 'ar') }}</textarea>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="name_en"
                                                class="form-label">{{ trans('settings_trans.course_content_ar') }}</label>
                                            <textarea class="form-control" id="course_content_ar" name="course_content_ar" rows="4">{{ $s_and_c->getTranslation('content', 'ar') }}</textarea>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="name_en"
                                                class="form-label">{{ trans('settings_trans.introduction_en') }}</label>
                                            <textarea class="form-control" id="introduction_en" name="introduction_en" rows="4">{{ $s_and_c->getTranslation('introduction', 'en') }}</textarea>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="name_en"
                                                class="form-label">{{ trans('settings_trans.course_content_en') }}</label>
                                            <textarea class="form-control" id="course_content_en" name="course_content_en" rows="4">{{ $s_and_c->getTranslation('content', 'en') }}</textarea>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit"
                                                class="btn btn-primary">{{ trans('settings_trans.update') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="border-navs-profile" role="tabpanel">
                                <div class="d-grid gap-2">
                                    <button data-bs-toggle="modal" data-bs-target="#signupModal"
                                        class="btn btn-primary waves-effect waves-light">{{ trans('settings_trans.add') }}</button>
                                </div>
                                <table id="example"
                                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-ordering="false">{{ trans('settings_trans.sr_no') }}</th>
                                            <th data-ordering="false">{{ trans('settings_trans.id') }}</th>
                                            <th data-ordering="false">{{ trans('settings_trans.duration') }}</th>
                                            <th data-ordering="false">{{ trans('settings_trans.place') }}</th>
                                            <th data-ordering="false">{{ trans('settings_trans.date') }}</th>
                                            <th data-ordering="false">{{ trans('settings_trans.status') }}</th>
                                            <th>{{ trans('settings_trans.create_date') }}</th>
                                            <th>{{ trans('settings_trans.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($s_and_c_d as $data)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->duration }}</td>
                                                <td>{{ $data->place->name }}</td>
                                                <td>{{ $data->date }}</td>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <span class="badge badge-label bg-success"><i
                                                                class="mdi mdi-circle-medium"></i>
                                                            {{ trans('settings_trans.default_true') }}</span>
                                                    @endif
                                                    @if ($data->status == 0)
                                                        <span class="badge badge-label bg-warning"><i
                                                                class="mdi mdi-circle-medium"></i>
                                                            {{ trans('settings_trans.default_false') }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><button data-bs-toggle="modal"
                                                                    data-bs-target="#signupModals{{ $data->id }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    تعديل</button></li>
                                                            <li><button data-bs-toggle="modal"
                                                                    data-bs-target="#signupModal{{ $data->id }}"
                                                                    class="dropdown-item edit-item-btn"> <i
                                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                    حذف</button></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div id="signupModals{{ $data->id }}" class="modal fade" tabindex="-1"
                                                aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 overflow-hidden">
                                                        <div class="modal-header p-3">
                                                            <h4 class="card-title mb-0">
                                                                {{ trans('settings_trans.update_Countries') }}
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('s_and_c_d_settings.update', 'test') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="sorting"
                                                                        class="form-label">{{ trans('settings_trans.date') }}</label>
                                                                    <input type="date" class="form-control"
                                                                        id="date" name="date"
                                                                        placeholder="{{ trans('settings_trans.sorting_enter') }}"
                                                                        required value="{{ $data->date }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name_ar"
                                                                        class="form-label">{{ trans('settings_trans.duration_ar') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        id="duration_ar" name="duration_ar"
                                                                        value="{{ $data->getTranslation('duration', 'ar') }}">
                                                                    <input class="form-control" id="id"
                                                                        name="id" value="{{ $data->id }}"
                                                                        type="hidden">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name_en"
                                                                        class="form-label">{{ trans('settings_trans.duration_en') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        id="duration_en" name="duration_en"
                                                                        value="{{ $data->getTranslation('duration', 'en') }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="ForminputState"
                                                                        class="form-label">{{ trans('settings_trans.place') }}</label>
                                                                    <select name="place_id" class="form-control SlectBox">
                                                                        <!--placeholder-->
                                                                        <option value="" selected disabled>
                                                                            {{ trans('settings_trans.place_select') }}
                                                                        </option>
                                                                        @foreach ($place as $data2)
                                                                            <option value="{{ $data2->id }}"
                                                                                @if ($data2->id == $data->place_id) selected @endif>
                                                                                {{ $data2->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="default"
                                                                        class="form-label">{{ trans('settings_trans.status') }}</label>
                                                                    <select name="status" id="statusf"
                                                                        class="form-control" required>
                                                                        <option value="1"
                                                                            @if ($data->status == 1) selected @endif>
                                                                            {{ trans('settings_trans.default_true') }}
                                                                        </option>
                                                                        <option value="0"
                                                                            @if ($data->status == 0) selected @endif>
                                                                            {{ trans('settings_trans.default_false') }}
                                                                        </option>
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
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center p-5">
                                                            <lord-icon
                                                                src="{{ URL::asset('assets/images/icon/tdrtiskw.json') }}"
                                                                trigger="loop" colors="primary:#f7b84b,secondary:#405189"
                                                                style="width:130px;height:130px">
                                                            </lord-icon>
                                                            <div class="mt-4 pt-4">
                                                                <h4>{{ trans('settings_trans.massagedelete_d') }}!</h4>
                                                                <p class="text-muted">
                                                                    {{ trans('settings_trans.massagedelete_p') }}{{ $data->name }}
                                                                </p>
                                                                <!-- Toogle to second dialog -->
                                                                <form
                                                                    action="{{ route('s_and_c_d_settings.destroy', 'test') }}"
                                                                    method="post">
                                                                    {{ method_field('delete') }}
                                                                    {{ csrf_field() }}
                                                                    <input class="form-control" id="id"
                                                                        name="id" value="{{ $data->id }}"
                                                                        type="hidden">
                                                                    <button class="btn btn-warning"
                                                                        data-bs-target="#secondmodal"
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
                    </div><!-- end card-body -->
                </div>
            </div>
            <div id="signupModal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 overflow-hidden">
                        <div class="modal-header p-3">
                            <h4 class="card-title mb-0">{{ trans('settings_trans.add') }}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('s_and_c_d_settings.store') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="sorting" class="form-label">{{ trans('settings_trans.date') }}</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        placeholder="{{ trans('settings_trans.sorting_enter') }}" required>
                                    <input type="text" class="form-control" id="course_id" name="course_id"
                                        value="{{ $id }}" hidden>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="duration_ar"
                                            class="form-label">{{ trans('settings_trans.duration_ar') }}</label>
                                        <input type="text" class="form-control" id="duration_ar" name="duration_ar"
                                            placeholder="{{ trans('settings_trans.duration_ar_enter') }}" required>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="duration_en"
                                            class="form-label">{{ trans('settings_trans.duration_en') }}</label>
                                        <input type="text" class="form-control" id="duration_en" name="duration_en"
                                            placeholder="{{ trans('settings_trans.duration_en_enter') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="ForminputState"
                                        class="form-label">{{ trans('settings_trans.place') }}</label>
                                    <select name="place_id" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="" selected disabled>
                                            {{ trans('settings_trans.place_select') }}
                                        </option>
                                        @foreach ($place as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="text-end">
                                    <button type="submit"
                                        class="btn btn-primary">{{ trans('settings_trans.add') }}</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
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
