@extends('admin.layouts.app')
@section('title',trans('local.dashboard'))
@section('sidebar')
    @include('admin.layouts.sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{ trans('local.dashboard') }}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">test</li>
          </ol>
        </div>
      </div>
    </div>
</div>
@endsection
