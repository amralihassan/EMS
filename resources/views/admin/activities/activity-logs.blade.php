@extends('admin.layouts.app')
@section('title', trans('local.activities_logs'))
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{trans('local.activities_logs')}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{trans('local.activities_logs')}}
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
            <div class="table-responsive">
                <table id="dynamic-table" class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('local.description') }}</th>
                            <th>{{ trans('local.model') }}</th>
                            <th>{{ trans('local.id') }}</th>
                            <th>{{ trans('local.username') }}</th>
                            <th>{{ trans('local.created_at') }}</th>
                            <th>{{ trans('local.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{$activity->description}}</td>
                                <td>{{$activity->subject_type}}</td>
                                <td>{{$activity->subject_id}}</td>
                                <td>{{$activity->user->username}}</td>
                                <td>{{$activity->created_at}}</td>
                                <td>
                                    <a href="{{route('activities.action',$activity->id)}}" class="btn btn-info btn-sm"><i class="la la-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function () {
        var myTable = $('#dynamic-table').DataTable({
        @include('admin.datatables._config')
        buttons: [
            // default btns
            @include('admin.datatables._buttons')
        ],
        @include('admin.datatables._lang')
      });
      @include('admin.datatables._multi-select')
    });

</script>
@include('admin.datatables._links')
@endsection
