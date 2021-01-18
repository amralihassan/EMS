<div class="col-lg-4 col-md-6">
    <div class="form-group">
      <label>{{ trans('student::local.division_name') }}</label>
      <select name="division_id[]" class="form-control select2" multiple>
          @foreach ($divisions as $division)
              <option  {{in_array( $division->id, $design->divisions->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$division->id}}">
                  {{$division->division_name}}</option>
          @endforeach
      </select>
    </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="form-group">
      <label>{{ trans('student::local.grade_name') }}</label>
      <select name="grade_id[]" class="form-control select2" multiple>
          @foreach ($grades as $grade)
              <option {{in_array( $grade->id, $design->grades->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$grade->id}}">
                  {{$grade->grade_name}}</option>
          @endforeach
      </select>
    </div>
</div>
<div class="col-lg-4 col-md-6">
  <div class="form-group">
    <label>{{ trans('student::local.default') }}</label>
    <select name="default" class="form-control" required>
        <option {{old('default',$design->default) == 'yes' ||
        old('default',$design->default) == trans('local.yes') ? 'selected' : ''}} value="yes">{{ trans('local.yes') }}</option>
        <option {{old('default',$design->default) == 'no' ||
            old('default',$design->default) == trans('local.no') ? 'selected' : ''}} value="no">{{ trans('local.no') }}</option>
    </select>
  </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="form-group">
      <label >{{ trans('student::local.design_name') }}</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input @error('file_name') is-invalid @enderror" id="inputGroupFile01" name="file_name">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
     </div>
    </div>
</div>
