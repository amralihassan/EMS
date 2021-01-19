<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_classroom_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('student::local.ar_classroom_name') }}" name="ar_name" value="{{old('ar_name', $classroom->ar_name)}}">
            @error('ar_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_classroom_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('student::local.en_classroom_name') }}" name="en_name" value="{{old('en_name', $classroom->en_name)}}">
            @error('en_name')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            <label>{{ trans('student::local.division_name') }}</label>
            <select name="division_id" class="form-control @error('division_id') is-invalid @enderror">
                <option value="">{{ trans('local.select') }}</option>
                @foreach ($divisions as $division)
                    <option {{old('division_id',$classroom->division_id) == $division->id ? 'selected':''}} value="{{$division->id}}">{{$division->division_name}}</option>
                @endforeach
            </select>
            @error('division_id')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            <label>{{ trans('student::local.grade_name') }}</label>
            <select name="grade_id" class="form-control @error('grade_id') is-invalid @enderror">
                <option value="">{{ trans('local.select') }}</option>
                @foreach ($grades as $grade)
                    <option {{old('grade_id',$classroom->grade_id) == $grade->id ? 'selected':''}} value="{{$grade->id}}">{{$grade->grade_name}}</option>
                @endforeach
            </select>
            @error('grade_id')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="form-group">
            <label>{{ trans('student::local.academic_year_name') }}</label>
            <select name="year_id" class="form-control @error('year_id') is-invalid @enderror">
                <option value="">{{ trans('local.select') }}</option>
                @foreach ($years as $year)
                    <option {{old('year_id',$classroom->year_id) == $year->id ? 'selected':''}} value="{{$year->id}}">{{$year->name}}</option>
                @endforeach
            </select>
            @error('year_id')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.total_capacity') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('total') is-invalid @enderror" placeholder="{{ trans('student::local.total_capacity') }}" name="total" value="{{old('total', $classroom->total)}}">
            @error('total')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-2 col-md-3">
        <div class="form-group">
            <label>{{ trans('student::local.sort') }}</label>
            <input type="number" min="0" step="1" class="form-control @error('sort') is-invalid @enderror" placeholder="{{ trans('student::local.sort') }}" name="sort" value="{{old('sort', $classroom->sort)}}">
            @error('sort')
                <span class="danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
