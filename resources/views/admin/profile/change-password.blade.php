@extends('admin.layouts.app')
@section('title', trans('local.change_password'))
@section('sidebar')
@include('admin.layouts.sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{trans('local.change_password')}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{trans('local.change_password')}}
            </li>
          </ol>
        </div>
      </div>
    </div>
</div>
<div class="row match-height">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
            <form class="form" action="{{route('update.password')}}" method="POST">
              @csrf
                <div class="form-body">
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group row">
                            <label>{{ trans('local.password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ trans('local.password') }}" name="password" value="{{old('password')}}">
                            @error('password')
                                <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group row">
                            <label>{{ trans('local.confirm_password') }}</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="{{ trans('local.confirm_password') }}" name="confirm_password" value="{{old('confirm_password')}}">
                            @error('confirm_password')
                                <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
              <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1" onclick="location.href='{{route('dashboard')}}';">
                  <i class="ft-x"></i> {{ trans('local.cancel') }}
                </button>
                <button type="submit" class="btn btn-primary">
                  <i class="la la-check-square-o"></i> {{ trans('local.update_password') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
