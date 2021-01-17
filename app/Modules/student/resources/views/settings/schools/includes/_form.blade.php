<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_school_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_school_name') }}" name="ar_name" value="{{old('ar_name', $school->ar_name)}}">
            @error('ar_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_school_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_school_name') }}" name="en_name" value="{{old('en_name', $school->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.school_type') }}</label>
            <select name="school_type" class="form-control @error('school_type') is-invalid @enderror">
                <option value="">{{ trans('local.select') }}</option>
                <option {{ (old('school_type', $school->school_type) == trans('student::local.private')) ||
                (old('school_type', $school->school_type) == 'private') ?'selected':''}} value="private">{{ trans('student::local.private') }}</option>
                <option {{ (old('school_type', $school->school_type) == trans('student::local.lang')) ||
                (old('school_type', $school->school_type) =='lang')?'selected':''}} value="lang">{{ trans('student::local.lang') }}</option>
                <option {{ (old('school_type', $school->school_type) == trans('student::local.international')) ||
                    (old('school_type', $school->school_type) =='international')?'selected':''}} value="international">{{ trans('student::local.international') }}</option>
            </select>
            @error('end_stage')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.school_government') }}</label>
            <input type="text" class="form-control @error('school_government') is-invalid @enderror" placeholder="{{ trans('student::local.school_government') }}" name="school_government" value="{{old('school_government', $school->school_government)}}">
            @error('school_government')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            <label>{{ trans('student::local.school_address') }}</label>
            <input type="text" class="form-control @error('school_address') is-invalid @enderror" placeholder="{{ trans('student::local.school_address') }}" name="school_address" value="{{old('school_address', $school->school_address)}}">
            @error('school_address')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

