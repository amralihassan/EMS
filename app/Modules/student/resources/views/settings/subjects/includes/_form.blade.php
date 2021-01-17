<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_subject_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_subject_name') }}" name="ar_name" value="{{old('ar_name', $subject->ar_name)}}">
            @error('ar_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_shortcut') }}</label>
            <input type="text" class="form-control @error('ar_shortcut') is-invalid @enderror" placeholder="{{ trans('student::local.ar_shortcut') }}" name="ar_shortcut" value="{{old('ar_shortcut', $subject->ar_shortcut)}}">
            @error('ar_shortcut')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_subject_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_subject_name') }}" name="en_name" value="{{old('en_name', $subject->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_shortcut') }}</label>
            <input type="text" class="form-control @error('en_shortcut') is-invalid @enderror" placeholder="{{ trans('student::local.en_shortcut') }}" name="en_shortcut" value="{{old('en_shortcut', $subject->en_shortcut)}}">
            @error('en_shortcut')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-3">
    <div class="form-group row">
        <label>{{ trans('student::local.sort') }}</label>
        <input type="number" min="0" step="1" class="form-control @error('sort') is-invalid @enderror" placeholder="{{ trans('student::local.sort') }}" name="sort" value="{{old('sort', $subject->sort)}}">
        @error('sort')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>
