<div class="col-lg-4 col-md-6">
    <div class="form-group row">
        <label>{{ trans('local.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ trans('local.name') }}" name="name" value="{{old('name', $year->name)}}">
        @error('name')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.start_from') }}</label>
            <input type="date" class="form-control @error('start_from') is-invalid @enderror" placeholder="{{ trans('student::local.start_from') }}" name="start_from" value="{{old('start_from', $year->start_from)}}">
            @error('start_from')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.end_in') }}</label>
            <input type="date" class="form-control @error('end_in') is-invalid @enderror" placeholder="{{ trans('student::local.end_in') }}" name="end_in" value="{{old('end_in', $year->end_in)}}">
            @error('end_in')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.default_year') }}</label>
            <select name="active_year" class="form-control">
                <option
                    {{ old('active_year', $year->active_year) == trans('student::local.not_current') ||
                    old('active_year', $year->active_year) == 'not_current' ? 'selected' : '' }}
                    value="not current">{{ trans('student::local.not_current') }}</option>
                <option
                    {{ old('active_year', $year->active_year) == trans('student::local.current') ||
                    old('active_year', $year->active_year) == 'current' ? 'selected' : '' }}
                    value="current">{{ trans('student::local.current') }}</option>
            </select>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.year_status') }}</label>
            <select name="open_close_year" class="form-control">
                <option
                    {{ old('open_close_year', $year->open_close_year) == trans('student::local.close') ||
                     old('open_close_year', $year->open_close_year) == 'close' ? 'selected' : '' }}
                    value="close">{{ trans('student::local.close') }}</option>
                <option
                    {{ old('open_close_year', $year->open_close_year) == trans('student::local.open') ||
                    old('open_close_year', $year->open_close_year) == 'open' ? 'selected' : '' }}
                    value="open">{{ trans('student::local.open') }}</option>
            </select>
        </div>
    </div>
</div>
