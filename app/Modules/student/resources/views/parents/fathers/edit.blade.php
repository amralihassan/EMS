@extends('admin.layouts.app')
@section('title', trans('student::local.edit_father_data'))
@section('sidebar')
    @include('admin.layouts.sidebars.students-sidebar')
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ trans('student::local.edit_father_data') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ route('students.dashboard') }}">{{ trans('local.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('parents.index') }}">{{ trans('local.parents') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('student::local.edit_father_data') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ route('fathers.update', $father->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <h4 class="form-section"> {{ trans('student::local.father_main_data') }}</h4>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.ar_st_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('ar_st_name', $father->ar_st_name) }}"
                                                placeholder="{{ trans('student::local.ar_st_name') }}" name="ar_st_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.ar_nd_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('ar_nd_name', $father->ar_nd_name) }}"
                                                placeholder="{{ trans('student::local.ar_nd_name') }}" name="ar_nd_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.ar_rd_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('ar_rd_name', $father->ar_rd_name) }}"
                                                placeholder="{{ trans('student::local.ar_rd_name') }}" name="ar_rd_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.ar_th_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('ar_th_name', $father->ar_th_name) }}"
                                                placeholder="{{ trans('student::local.ar_th_name') }}" name="ar_th_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.en_st_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('en_st_name', $father->en_st_name) }}"
                                                placeholder="{{ trans('student::local.en_st_name') }}" name="en_st_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.en_nd_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('en_nd_name', $father->en_nd_name) }}"
                                                placeholder="{{ trans('student::local.en_nd_name') }}" name="en_nd_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.en_rd_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('en_rd_name', $father->en_rd_name) }}"
                                                placeholder="{{ trans('student::local.en_rd_name') }}" name="en_rd_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.en_th_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('en_th_name', $father->en_th_name) }}"
                                                placeholder="{{ trans('student::local.en_th_name') }}" name="en_th_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.id_type') }}</label>
                                            <select name="father_id_type" class="form-control">
                                                <option value="">{{ trans('student::local.select') }}</option>
                                                <option
                                                    {{ old('father_id_type', $father->father_id_type) == trans('student::local.national_id') || old('father_id_type', $father->father_id_type) == 'national_id' ? 'selected' : '' }}
                                                    value="national_id">{{ trans('student::local.national_id') }}</option>
                                                <option
                                                    {{ old('father_id_type', $father->father_id_type) == trans('student::local.passport') || old('father_id_type', $father->father_id_type) == 'passport' ? 'selected' : '' }}
                                                    value="passport">{{ trans('student::local.passport') }}</option>
                                            </select>
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.id_number') }}</label>
                                            <input type="number" min="0" class="form-control "
                                                value="{{ old('father_id_number', $father->father_id_number) }}"
                                                placeholder="{{ trans('student::local.id_number') }}"
                                                name="father_id_number">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.religion') }}</label>
                                            <select name="father_religion" class="form-control">
                                                <option value="">{{ trans('student::local.select') }}</option>
                                                <option
                                                    {{ old('father_religion', $father->father_religion) == 'muslim' ? 'selected' : '' }}
                                                    value="muslim">{{ trans('student::local.muslim') }}</option>
                                                <option
                                                    {{ old('father_religion', $father->father_religion) == 'non_muslim' ? 'selected' : '' }}
                                                    value="non_muslim">{{ trans('student::local.non_muslim') }}</option>
                                            </select>
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.nationality_id') }}</label>
                                            <select name="father_nationality_id" class="form-control ">
                                                <option value="">{{ trans('student::local.select') }}</option>
                                                @foreach ($nationalities as $nationality)
                                                    <option
                                                        {{ old('father_nationality_id', $father->father_nationality_id) == $nationality->id ? 'selected' : '' }}
                                                        value="{{ $nationality->id }}">{{ $nationality->male_nationality }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.job') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('father_job', $father->father_job) }}"
                                                placeholder="{{ trans('student::local.job') }}" name="father_job">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.qualification') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('father_qualification', $father->father_qualification) }}"
                                                placeholder="{{ trans('student::local.qualification') }}"
                                                name="father_qualification">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.facebook') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('father_facebook', $father->father_facebook) }}"
                                                placeholder="{{ trans('student::local.facebook') }}" name="father_facebook">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.whatsapp_number') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('father_whatsapp_number', $father->father_whatsapp_number) }}"
                                                placeholder="{{ trans('student::local.whatsapp_number') }}"
                                                name="father_whatsapp_number">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"> {{ trans('student::local.contacts_data') }}</h4>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.home_phone') }}</label>
                                            <input type="number" min="0" class="form-control "
                                                value="{{ old('father_home_phone', $father->father_home_phone) }}"
                                                placeholder="{{ trans('student::local.home_phone') }}"
                                                name="father_home_phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.mobile1') }}</label>
                                            <input type="number" min="0" class="form-control "
                                                value="{{ old('father_mobile1', $father->father_mobile1) }}"
                                                placeholder="{{ trans('student::local.mobile1') }}" name="father_mobile1">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.mobile2') }}</label>
                                            <input type="number" min="0" class="form-control "
                                                value="{{ old('father_mobile2', $father->father_mobile2) }}"
                                                placeholder="{{ trans('student::local.mobile2') }}" name="father_mobile2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.email') }}</label>
                                            <input type="email" class="form-control "
                                                value="{{ old('father_email', $father->father_email) }}"
                                                placeholder="{{ trans('student::local.email') }}" name="father_email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.block_no') }}</label>
                                            <input type="number" min="0" class="form-control "
                                                value="{{ old('father_block_no', $father->father_block_no) }}"
                                                placeholder="{{ trans('student::local.block_no') }}" name="father_block_no">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.street_name') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('father_street_name', $father->father_street_name) }}"
                                                placeholder="{{ trans('student::local.street_name') }}"
                                                name="father_street_name">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.state') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('father_state', $father->father_state) }}"
                                                placeholder="{{ trans('student::local.state') }}" name="father_state">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.government') }}</label>
                                            <input type="text" class="form-control "
                                                value="{{ old('father_government', $father->father_government) }}"
                                                placeholder="{{ trans('student::local.government') }}"
                                                name="father_government">
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"> {{ trans('student::local.extra_info') }}</h4>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.educational_mandate') }}</label>
                                            <select name="educational_mandate" class="form-control">
                                                <option value="">{{ trans('student::local.select') }}</option>
                                                <option
                                                    {{ old('educational_mandate', $father->educational_mandate) == trans('student::local.father') || old('educational_mandate', $father->educational_mandate) == 'father' ? 'selected' : '' }}
                                                    value="father">{{ trans('student::local.father') }}</option>
                                                <option
                                                    {{ old('educational_mandate', $father->educational_mandate) == trans('student::local.mother') || old('educational_mandate', $father->educational_mandate) == 'mother' ? 'selected' : '' }}
                                                    value="mother">{{ trans('student::local.mother') }}</option>
                                            </select>
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.marital_status') }}</label>
                                            <select name="marital_status" class="form-control">
                                                <option value="">{{ trans('student::local.select') }}</option>
                                                <option
                                                    {{ old('marital_status', $father->marital_status) == trans('student::local.married') || old('marital_status', $father->marital_status) == 'married' ? 'selected' : '' }}
                                                    value="married">{{ trans('student::local.married') }}</option>
                                                <option
                                                    {{ old('marital_status', $father->marital_status) == trans('student::local.divorced') || old('marital_status', $father->marital_status) == 'divorced' ? 'selected' : '' }}
                                                    value="divorced">{{ trans('student::local.divorced') }}</option>
                                                <option
                                                    {{ old('marital_status', $father->marital_status) == trans('student::local.separated') || old('marital_status', $father->marital_status) == 'separated' ? 'selected' : '' }}
                                                    value="separated">{{ trans('student::local.separated') }}</option>
                                                <option
                                                    {{ old('marital_status', $father->marital_status) == trans('student::local.widower') || old('marital_status', $father->marital_status) == 'widower' ? 'selected' : '' }}
                                                    value="widower">{{ trans('student::local.widower') }}</option>
                                            </select>
                                            <span class="red">{{ trans('student::local.requried') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('student::local.recognition') }}</label>
                                            <select name="recognition" class="form-control">
                                                <option value="">{{ trans('student::local.select') }}</option>
                                                <option
                                                    {{ old('recognition', $father->recognition) == trans('student::local.facebook') || old('recognition', $father->recognition) == 'facebook' ? 'selected' : '' }}
                                                    value="facebook">{{ trans('student::local.fb') }}</option>
                                                <option
                                                    {{ old('recognition', $father->recognition) == trans('student::local.parent') || old('recognition', $father->recognition) == 'parent' ? 'selected' : '' }}
                                                    value="parent">{{ trans('student::local.parent') }}</option>
                                                <option
                                                    {{ old('recognition', $father->recognition) == trans('student::local.street') || old('recognition', $father->recognition) == 'street' ? 'selected' : '' }}
                                                    value="street">{{ trans('student::local.street') }}</option>
                                                <option
                                                    {{ old('recognition', $father->recognition) == trans('student::local.school_hub') || old('recognition', $father->recognition) == 'school_hub' ? 'selected' : '' }}
                                                    value="school_hub">{{ trans('student::local.school_hub') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1"
                                    onclick="location.href='{{ route('fathers.show', $father->id) }}';">
                                    <i class="ft-x"></i> {{ trans('local.cancel') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> {{ trans('local.save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
