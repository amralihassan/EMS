<form action="{{route('id-cards-designs.filter')}}" method="get" id="formSearch">
    @csrf
    <div class="row mb-1 mt-1">
        <div class="col-lg-2 col-md-4">
            <select name="division_id" class="form-control">
                <option value="">{{ trans('student::local.division_name') }}</option>
                @foreach ($divisions as $division)
                    <option {{request('division_id') == $division->id ? 'selected' : ''}} value="{{$division->id}}">
                        {{$division->division_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2 col-md-4">
            <select name="grade_id" class="form-control">
                <option value="">{{ trans('student::local.grade_name') }}</option>
                @foreach ($grades as $grade)
                    <option {{request('grade_id') == $grade->id ? 'selected' : ''}} value="{{$grade->id}}">
                        {{$grade->grade_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2 col-md-4">
            <button id="filter" type="submit" class="btn btn-primary btn-sm"><i class="la la-search"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <a href="{{route('id-cards-designs.create')}}" class="btn btn-success buttons-print btn-success ">{{ trans('student::local.add_design') }}</a>
        </div>
    </div>
</form>
