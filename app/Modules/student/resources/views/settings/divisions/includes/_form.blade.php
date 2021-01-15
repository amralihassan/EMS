<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_division_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_division_name') }}" name="ar_name" value="{{old('ar_name', $division->ar_name)}}">
            @error('ar_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_division_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_division_name') }}" name="en_name" value="{{old('en_name', $division->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_school_name') }}</label>
            <input type="text" class="form-control @error('ar_school_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_school_name') }}" name="ar_school_name" value="{{old('ar_school_name', $division->ar_school_name)}}">
            @error('ar_school_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_school_name') }}</label>
            <input type="text" class="form-control @error('en_school_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_school_name') }}" name="en_school_name" value="{{old('en_school_name', $division->en_school_name)}}">
            @error('en_school_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.total_capacity') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('total') is-invalid @enderror" placeholder="{{ trans('student::local.total_capacity') }}" name="total" value="{{old('total', $division->total)}}">
            @error('total')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.sort') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('sort') is-invalid @enderror" placeholder="{{ trans('student::local.sort') }}" name="sort" value="{{old('sort', $division->sort)}}">
            @error('sort')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
