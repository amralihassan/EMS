<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_grade_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_grade_name') }}" name="ar_name" value="{{old('ar_name', $grade->ar_name)}}">
            @error('ar_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_grade_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_grade_name') }}" name="en_name" value="{{old('en_name', $grade->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_online_name') }}</label>
            <input type="text" class="form-control @error('ar_online_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_online_name') }}" name="ar_online_name" value="{{old('ar_online_name', $grade->ar_online_name)}}">
            @error('ar_online_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_online_name') }}</label>
            <input type="text" class="form-control @error('en_online_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_online_name') }}" name="en_online_name" value="{{old('en_online_name', $grade->en_online_name)}}">
            @error('en_online_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.from_age_year') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('from_age_year') is-invalid @enderror" placeholder="{{ trans('student::local.from_age_year') }}" name="from_age_year" value="{{old('from_age_year', $grade->from_age_year)}}">
            @error('from_age_year')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.from_age_month') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('from_age_month') is-invalid @enderror" placeholder="{{ trans('student::local.from_age_month') }}" name="from_age_month" value="{{old('from_age_month', $grade->from_age_month)}}">
            @error('from_age_month')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.to_age_year') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('to_age_year') is-invalid @enderror" placeholder="{{ trans('student::local.to_age_year') }}" name="to_age_year" value="{{old('to_age_year', $grade->to_age_year)}}">
            @error('to_age_year')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.to_age_month') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('to_age_month') is-invalid @enderror" placeholder="{{ trans('student::local.to_age_month') }}" name="to_age_month" value="{{old('to_age_month', $grade->to_age_month)}}">
            @error('to_age_month')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.end_stage') }}</label>
            <select name="end_stage" class="form-control @error('end_stage') is-invalid @enderror">
                <option {{ (old('end_stage', $grade->end_stage) == trans('local.no')) ||
                (old('end_stage', $grade->end_stage) == 'no') ?'selected':''}} value="no">{{ trans('local.no') }}</option>
                <option {{ (old('end_stage', $grade->end_stage) == trans('local.yes')) ||
                (old('end_stage', $grade->end_stage) =='yes')?'selected':''}} value="yes">{{ trans('local.yes') }}</option>
            </select>
            @error('end_stage')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.sort') }}</label>
            <input type="number" min="0" step="1" name="sort" class="form-control @error('sort') is-invalid @enderror" value="{{old('sort', $grade->sort)}}">
            @error('sort')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="form-group row">
        <label>{{ trans('student::local.stages') }}</label>
        <select name="stage_id" class="form-control @error('stage_id') is-invalid @enderror">
            <option value="">{{ trans('local.select') }}</option>
            @foreach ($stages as $stage)
                <option {{ (old('stage_id', $grade->id) == $stage->id) ?'selected':''}} value="{{$stage->id}}">{{$stage->stage_name}}</option>
            @endforeach
        </select>
        @error('stage_id')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>

