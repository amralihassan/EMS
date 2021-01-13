@extends('admin.layouts.app')
@section('title',trans('local.action') )
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{trans('local.action')}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('activities.logs')}}">{{ trans('local.activities_logs') }}</a></li>
            <li class="breadcrumb-item active">{{trans('local.action')}}</li>
          </ol>
        </div>
      </div>
    </div>
</div>

<div class="content-detached content-right">
    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-head">
              <div class="card-header">
                <h4 class="card-title"> <i class="la la-history"></i> <strong>{{ trans('local.log_info') }}</strong></h4>
              </div>
            </div>
            <div class="card-content">
              <div class="card-body">
                <!-- Task List table -->
                <h5><strong>{{ trans('local.description') }} : </strong>{{$activity->description}}</h5>
                <h5><strong>{{ trans('local.model') }} : </strong>{{$activity->subject_type}}</h5>
                <h5><strong>{{ trans('local.id') }} : </strong>{{$activity->id}}</h5>
                <h5><strong>{{ trans('local.created_at') }} :</strong>{{$activity->created_at}}</h5>
                <h5><strong>{{ trans('local.updated_at') }} :</strong>{{$activity->updated_at}}</h5>

                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h4><strong>{{ trans('local.old') }}</strong></h4>
                        <div class="table-responsive">
                            @foreach($activity->properties as $index => $member)
                                @if ($index == 'old')
                                    @foreach ($member as $item)
                                        {{$item}} <br>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h4><strong>{{ trans('local.new') }}</strong></h4>
                        <div class="table-responsive">
                            @foreach($activity->properties as $index => $member)
                                @if ($index == 'attributes')
                                    @foreach ($member as $item)
                                        {{$item}} <br>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="sidebar-detached sidebar-left" ,=",">
    <div class="sidebar">
      <div class="bug-list-sidebar-content">
        <!-- Predefined Views -->
        <div class="card" style="min-height: 300px">
          <div class="card-head">
            <div class="media p-1">
              <div class="media-left pr-1">
                <span class="avatar avatar-sm avatar-online rounded-circle">
                  <img src="{{asset($activity->user->profile_image)}}" alt="avatar"><i></i></span>
              </div>
              <div class="media-body media-middle">
                <h5 class="media-heading">{{$activity->user->admin_name}}</h5>
              </div>
            </div>
          </div>
          <hr>
            <h5 class="pl-1">
                <strong>{{ trans('local.username') }} :</strong>
                {{$activity->user->username}}
            </h5>

            <h5 class="pl-1">
                <strong>{{ trans('local.email') }} :</strong>
                {{$activity->user->email}}
            </h5>

            <h5 class="pl-1">
                <strong>{{ trans('local.status') }} :</strong>
                {{$activity->user->status}}
            </h5>
            <h5 class="pl-1">
                <strong>{{ trans('local.created_at') }} :</strong><br>
                {{$activity->user->created_at}}
            </h5>
            <h5 class="pl-1">
                <strong>{{ trans('local.updated_at') }} :</strong><br>
                {{$activity->user->updated_at}}
            </h5>
        </div>
        <!--/ Predefined Views -->
      </div>
    </div>
  </div>
@endsection
