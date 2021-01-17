<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_language_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_language_name') }}" name="ar_name" value="{{old('ar_name', $language->ar_name)}}">
            @error('ar_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_language_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_language_name') }}" name="en_name" value="{{old('en_name', $language->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.lang_type') }}</label>
            <select name="lang_type" class="form-control @error('lang_type') is-invalid @enderror">
                <option value="">{{ trans('local.select') }}</option>
                <option {{ (old('lang_type', $language->lang_type) == trans('student::local.speak')) ||
                (old('lang_type', $language->lang_type) == 'speak') ?'selected':''}} value="speak">{{ trans('student::local.speak') }}</option>
                <option {{ (old('lang_type', $language->lang_type) == trans('student::local.study')) ||
                (old('lang_type', $language->lang_type) =='study')?'selected':''}} value="study">{{ trans('student::local.study') }}</option>
                <option {{ (old('lang_type', $language->lang_type) == trans('student::local.speak_study')) ||
                    (old('lang_type', $language->lang_type) =='speak_study')?'selected':''}} value="speak_study">{{ trans('student::local.speak_study') }}</option>
            </select>
            @error('end_stage')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.sort') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('sort') is-invalid @enderror" placeholder="{{ trans('student::local.sort') }}" name="sort" value="{{old('sort', $language->sort)}}">
            @error('sort')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
