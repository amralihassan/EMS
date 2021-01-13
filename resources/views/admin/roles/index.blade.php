@extends('admin.layouts.app')
@section('title', trans('local.roles'))
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{trans('local.roles')}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{trans('local.roles')}}</li>
          </ol>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
              <div class="table-responsive">
                  <form id='formData' method="post">
                    @csrf
                    <table id="dynamic-table" class="table data-table" >
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="ace" /></th>
                                <th>#</th>
                                <th>{{trans('local.name')}}</th>
                                <th>{{trans('local.display_name')}}</th>
                                <th>{{trans('local.description')}}</th>
                                <th>{{trans('local.show')}}</th>
                                <th>{{trans('local.edit')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </form>
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
                // new btn
                {
                    "text": "{{trans('local.add_role')}}",
                    "className": "btn btn-success mr-1",
                    action : function ( e, dt, node, config ) {
                        window.location.href = "{{route('roles.create')}}";
                        }
                },
                // delete btn
                @include('admin.roles.includes._delete-btn')
                // default btns
                @include('admin.datatables._buttons')
            ],
          ajax: "{{ route('roles.index') }}",
            @include('admin.roles.includes._columns')
            @include('admin.datatables._lang')
      });
      @include('admin.datatables._multi-select')
    });

</script>
@include('admin.datatables._links')
@endsection
