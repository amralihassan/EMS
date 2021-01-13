<div class="col-lg-4 col-md-6">
    <div class="form-group row">
        <label>{{ trans('local.name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ trans('local.name') }}" name="name" value="{{old('name', $role->name)}}">
        @error('name')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="form-group row">
        <label>{{ trans('local.display_name') }}</label>
        <input type="text" class="form-control @error('display_name') is-invalid @enderror" placeholder="{{ trans('local.display_name') }}" name="display_name" value="{{old('display_name', $role->display_name)}}">
        @error('display_name')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="form-group row">
        <label>{{ trans('local.description') }}</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="{{ trans('local.description') }}" name="description" value="{{old('description', $role->description)}}">
        @error('description')
            <span class="danger">{{$message}}</span>
        @enderror
    </div>
</div>
