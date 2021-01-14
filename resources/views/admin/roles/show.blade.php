@extends('admin.layouts.app')
@section('title', trans('local.roles'))
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
@endsection
@section('sidebar')
@include('admin.layouts.sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{$role->display_name}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">{{ trans('local.roles') }}</a></li>
            <li class="breadcrumb-item active">{{$role->display_name}}
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
              <form action="{{route('add.permission')}}" method="POST">
                @csrf

                <input type="hidden" name="role_id" value="{{$role->id}}">
                  <h4 class="form-section">{{ trans('local.general_settings') }}</h4>

                    @include('admin.roles.permissions.tree')

                  <div class="form-actions">
                    <button type="button" class="btn btn-warning mr-1" onclick="location.href='{{route('roles.index')}}';">
                      <i class="ft-x"></i> {{ trans('local.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                      <i class="la la-check-square-o"></i> {{ trans('local.update') }}
                    </button>
                  </div>
              </form>



          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
@endsection
