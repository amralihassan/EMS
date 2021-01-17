<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_step_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_step_name') }}" name="ar_name" value="{{old('ar_name', $step->ar_name)}}">
            @error('ar_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_step_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_step_name') }}" name="en_name" value="{{old('en_name', $step->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>


<div class="col-lg-2 col-md-3">
    <div class="form-group row">
        <label>{{ trans('student::local.sort') }}</label>
        <input type="number" min="0" step="1" class="form-control @error('sort') is-invalid @enderror" placeholder="{{ trans('student::local.sort') }}" name="sort" value="{{old('sort', $step->sort)}}">
        @error('sort')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>
