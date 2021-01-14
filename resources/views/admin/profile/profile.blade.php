@extends('admin.layouts.app')
@section('title', trans('local.edit_profile'))
@section('sidebar')
@include('admin.layouts.sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{trans('local.edit_profile')}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{trans('local.edit_profile')}}
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
            <form class="form" action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-body">
                    <h4 class="form-section">{{ trans('local.user_info') }}</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.en_name') }}</label>
                                <input type="text" class="form-control @error('en_name') is-invalid @enderror" placeholder="{{ trans('local.en_name') }}" name="en_name" value="{{old('en_name', $admin->en_name)}}">
                                @error('en_name')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.ar_name') }}</label>
                                <input type="text" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ trans('local.ar_name') }}" name="ar_name" value="{{old('ar_name', $admin->ar_name)}}">
                                @error('ar_name')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.prefer_lang') }}</label>
                                <select name="lang" required class="form-control @error('lang') is-invalid @enderror">
                                    <option value="">{{ trans('local.select') }}</option>
                                    <option {{ (old('lang', $admin->lang) == 'en')?'selected':''}} value="en">{{ trans('local.en') }}</option>
                                    <option {{ (old('lang', $admin->lang) == 'ar')?'selected':''}} value="ar">{{ trans('local.ar') }}</option>
                                </select>
                                @error('lang')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group row">
                            <label>{{ trans('local.profile_image') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image_profile">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            @error('image_profile')
                                <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <h4 class="form-section">{{ trans('local.account_info') }}</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('local.email') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('local.email') }}" name="email" value="{{old('email',$admin->email)}}">
                                @error('email')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('local.username') }}</label>
                                <input type="text" class="form-control" readonly placeholder="{{ trans('local.username') }}" name="username" value="{{$admin->username}}">
                            </div>
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
