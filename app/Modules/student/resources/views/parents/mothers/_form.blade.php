<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.mother_full_name') }}</label>
            <input type="text" class="form-control " value="{{ old('full_name', $mother->full_name) }}"
                placeholder="{{ trans('student::local.mother_full_name') }}" name="full_name">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.id_type') }}</label>
            <select name="mother_id_type" class="form-control">
                <option value="">{{ trans('student::local.select') }}</option>
                <option
                    {{ old('mother_id_type', $mother->mother_id_type) == trans('student::local.national_id') || old('mother_id_type', $mother->mother_id_type) == 'national_id' ? 'selected' : '' }}
                    value="national_id">{{ trans('student::local.national_id') }}</option>
                <option
                    {{ old('mother_id_type', $mother->mother_id_type) == trans('student::local.passport') || old('mother_id_type', $mother->mother_id_type) == 'passport' ? 'selected' : '' }}
                    value="passport">{{ trans('student::local.passport') }}</option>
            </select>
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.id_number') }}</label>
            <input type="text" class="form-control " value="{{ old('mother_id_number', $mother->mother_id_number) }}"
                placeholder="{{ trans('student::local.id_number') }}" name="mother_id_number">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.religion') }}</label>
            <select name="mother_religion" class="form-control">
                <option value="">{{ trans('student::local.select') }}</option>
                <option {{ old('mother_religion', $mother->mother_religion) == 'muslim' ? 'selected' : '' }}
                    value="muslim">{{ trans('student::local.muslim') }}</option>
                <option {{ old('mother_religion', $mother->mother_religion) == 'non_muslim' ? 'selected' : '' }}
                    value="non_muslim">{{ trans('student::local.non_muslim_m') }}</option>
            </select>
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.nationality_id') }}</label>
            <select name="mother_nationality_id" class="form-control ">
                <option value="">{{ trans('student::local.select') }}</option>
                @foreach ($nationalities as $nationality)
                    <option
                        {{ old('mother_nationality_id', $mother->mother_nationality_id) == $nationality->id ? 'selected' : '' }}
                        value="{{ $nationality->id }}">{{ $nationality->ar_name_nat_female }}</option>
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
            <input type="text" class="form-control " value="{{ old('mother_job', $mother->mother_job) }}"
                placeholder="{{ trans('student::local.job') }}" name="mother_job">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.qualification') }}</label>
            <input type="text" class="form-control "
                value="{{ old('mother_qualification', $mother->mother_qualification) }}"
                placeholder="{{ trans('student::local.qualification') }}" name="mother_qualification">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.facebook') }}</label>
            <input type="text" class="form-control " value="{{ old('mother_facebook', $mother->mother_facebook) }}"
                placeholder="{{ trans('student::local.facebook') }}" name="mother_facebook">
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.whatsapp_number') }}</label>
            <input type="text" class="form-control "
                value="{{ old('mother_whatsapp_number', $mother->mother_whatsapp_number) }}"
                placeholder="{{ trans('student::local.whatsapp_number') }}" name="mother_whatsapp_number">
        </div>
    </div>
</div>
<h4 class="form-section"> {{ trans('student::local.contacts_data') }}</h4>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.home_phone') }}</label>
            <input type="number" min="0" class="form-control "
                value="{{ old('mother_home_phone', $mother->mother_home_phone) }}"
                placeholder="{{ trans('student::local.home_phone') }}" name="mother_home_phone">
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.mobile1') }}</label>
            <input type="number" min="0" class="form-control "
                value="{{ old('mother_mobile1', $mother->mother_mobile1) }}"
                placeholder="{{ trans('student::local.mobile1') }}" name="mother_mobile1">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.mobile2') }}</label>
            <input type="number" min="0" class="form-control "
                value="{{ old('mother_mobile2', $mother->mother_mobile2) }}"
                placeholder="{{ trans('student::local.mobile2') }}" name="mother_mobile2">
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.email') }}</label>
            <input type="email" class="form-control " value="{{ old('mother_email', $mother->mother_email) }}"
                placeholder="{{ trans('student::local.email') }}" name="mother_email">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.block_no') }}</label>
            <input type="number" min="0" class="form-control "
                value="{{ old('mother_block_no', $mother->mother_block_no) }}"
                placeholder="{{ trans('student::local.block_no') }}" name="mother_block_no">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.street_name') }}</label>
            <input type="text" class="form-control "
                value="{{ old('mother_street_name', $mother->mother_street_name) }}"
                placeholder="{{ trans('student::local.street_name') }}" name="mother_street_name">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.state') }}</label>
            <input type="text" class="form-control " value="{{ old('mother_state', $mother->mother_state) }}"
                placeholder="{{ trans('student::local.state') }}" name="mother_state">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.government') }}</label>
            <input type="text" class="form-control " value="{{ old('mother_government', $mother->mother_government) }}"
                placeholder="{{ trans('student::local.government') }}" name="mother_government">
            <span class="red">{{ trans('student::local.requried') }}</span>
        </div>
    </div>
</div>
