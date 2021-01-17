<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_male_nationality_name') }}</label>
            <input type="text" class="form-control @error('ar_male_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_male_nationality_name') }}" name="ar_male_name" value="{{old('ar_male_name', $nationality->ar_male_name)}}">
            @error('ar_male_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_female_nationality_name') }}</label>
            <input type="text" class="form-control @error('ar_female_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_female_nationality_name') }}" name="ar_female_name" value="{{old('ar_female_name', $nationality->ar_female_name)}}">
            @error('ar_female_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_nationality_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_nationality_name') }}" name="en_name" value="{{old('en_name', $nationality->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

</div>


<div class="col-lg-2 col-md-3">
    <div class="form-group row">
        <label>{{ trans('student::local.sort') }}</label>
        <input type="number" min="0" step="1" class="form-control @error('sort') is-invalid @enderror" placeholder="{{ trans('student::local.sort') }}" name="sort" value="{{old('sort', $nationality->sort)}}">
        @error('sort')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>
