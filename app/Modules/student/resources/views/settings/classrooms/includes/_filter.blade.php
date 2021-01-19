<div class="row mt-1">
    <div class="col-lg-2 col-md-3">
        <select name="division_id" class="form-control" id="division_id">
            <option value="">{{ trans('local.select') }}</option>
            @foreach ($divisions as $division)
                <option {{old('division_id') == $division->id ? 'selected' : ''}} value="{{$division->id}}">
                    {{$division->division_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-2 col-md-3">
        <select name="grade_id" class="form-control" id="grade_id">
            <option value="">{{ trans('local.select') }}</option>
            @foreach ($grades as $grade)
                <option {{old('grade_id') == $grade->id ? 'selected' : ''}} value="{{$grade->id}}">
                    {{$grade->grade_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-2 col-md-3">
        <select name="year_id" class="form-control" id="year_id">
            @foreach ($years as $year)
                <option {{old('year_id') == $year->id ? 'selected' : ''}} value="{{$year->id}}">
                    {{$year->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-2 col-md-3">
        <button id="filter" class="btn btn-primary btn-sm"><i class="la la-search"></i></button>
    </div>
</div>
