@extends('admin.layouts.app')
@section('title', trans('local.general_settings'))
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{trans('local.general_settings')}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{trans('local.general_settings')}}
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
            <form class="form" action="{{route('update.settings')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-body">
                    <h4 class="form-section">{{ trans('local.school_name') }}</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.ar_school_name') }}</label>
                                <input type="text" class="form-control @error('ar_school_name') is-invalid @enderror" placeholder="{{ trans('local.ar_school_name') }}" name="ar_school_name" value="{{old('ar_school_name',settings()->ar_school_name)}}">
                                @error('ar_school_name')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.en_school_name') }}</label>
                                <input type="text" class="form-control @error('en_school_name') is-invalid @enderror" placeholder="{{ trans('local.en_school_name') }}" name="en_school_name" value="{{old('en_school_name',settings()->en_school_name)}}">
                                @error('en_school_name')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.ar_education_administration') }}</label>
                                <input type="text" class="form-control @error('ar_education_administration') is-invalid @enderror" placeholder="{{ trans('local.ar_education_administration') }}" name="ar_education_administration" value="{{old('ar_education_administration',settings()->ar_education_administration)}}">
                                @error('ar_education_administration')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.en_education_administration') }}</label>
                                <input type="text" class="form-control @error('en_education_administration') is-invalid @enderror" placeholder="{{ trans('local.en_education_administration') }}" name="en_education_administration" value="{{old('en_education_administration',settings()->en_education_administration)}}">
                                @error('en_education_administration')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.ar_governorate') }}</label>
                                <input type="text" class="form-control @error('ar_governorate') is-invalid @enderror" placeholder="{{ trans('local.ar_governorate') }}" name="ar_governorate" value="{{old('ar_governorate',settings()->ar_governorate)}}">
                                @error('ar_governorate')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.en_governorate') }}</label>
                                <input type="text" class="form-control @error('en_governorate') is-invalid @enderror" placeholder="{{ trans('local.en_governorate') }}" name="en_governorate" value="{{old('en_governorate',settings()->en_governorate)}}">
                                @error('en_governorate')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h4 class="form-section">{{ trans('local.school_info') }}</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.email') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('local.email') }}" name="email" value="{{old('email',settings()->email)}}">
                                @error('email')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.address') }}</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="{{ trans('local.address') }}" name="address" value="{{old('address',settings()->address)}}">
                                @error('address')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.facebook') }}</label>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" placeholder="{{ trans('local.facebook') }}" name="facebook" value="{{old('facebook',settings()->facebook)}}">
                                @error('facebook')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{ trans('local.youtube') }}</label>
                                <input type="text" class="form-control @error('youtube') is-invalid @enderror" placeholder="{{ trans('local.youtube') }}" name="youtube" value="{{old('youtube',settings()->youtube)}}">
                                @error('youtube')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 col-md-4">
                            <div class="form-group">
                                <label>{{ trans('local.contact1') }}</label>
                                <input type="text" class="form-control @error('contact1') is-invalid @enderror" placeholder="{{ trans('local.contact1') }}" name="contact1" value="{{old('contact1',settings()->contact1)}}">
                                @error('contact1')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="form-group">
                                <label>{{ trans('local.contact2') }}</label>
                                <input type="text" class="form-control @error('contact2') is-invalid @enderror" placeholder="{{ trans('local.contact2') }}" name="contact2" value="{{old('contact2',settings()->contact2)}}">
                                @error('contact2')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="form-group">
                                <label>{{ trans('local.contact3') }}</label>
                                <input type="text" class="form-control @error('contact3') is-invalid @enderror" placeholder="{{ trans('local.contact3') }}" name="contact3" value="{{old('contact3',settings()->contact3)}}">
                                @error('contact3')
                                    <span class="danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="form-group row">
                            <label>{{ trans('local.status') }}</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option {{ (old('status', settings()->status) == trans('local.open')) ||
                                (old('status', settings()->status) == 'open') ?'selected':''}} value="open">{{ trans('local.open') }}</option>
                                <option {{ (old('status', settings()->status) == trans('local.close')) ||
                                (old('status', settings()->status) =='close')?'selected':''}} value="close">{{ trans('local.close') }}</option>
                            </select>
                            @error('status')
                                <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- icon --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group row">
                            <label>{{ trans('local.icon') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="icon">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            @error('icon')
                                <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- logo --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group row">
                            <label>{{ trans('local.logo') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="logo">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            @error('logo')
                                <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label>{{ trans('local.msg_maintenance') }}</label>
                            <textarea name="msg_maintenance" class="form-control @error('msg_maintenance') is-invalid @enderror" cols="30" rows="10">{{old('msg_maintenance',settings()->msg_maintenance)}}</textarea>
                            @error('status')
                                <span class="danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
              <div class="form-actions">
                  <button type="button" class="btn btn-warning mr-1" onclick="location.href='{{route('dashboard')}}';">
                      <i class="ft-x"></i> {{ trans('local.cancel') }}
                  </button>
                  @if (authInfo()->isAbleTo('update_setting'))
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ trans('local.update') }}
                        </button>
                  @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
