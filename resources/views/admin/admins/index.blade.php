@extends('admin.layouts.app')
@section('title', trans('local.admins'))
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">{{ trans('local.admins') }}</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('local.admins') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        {{-- <a href="{{route('administrators.create')}}" class="btn btn-primary mb-2"><i class="feather icon-plus"></i>{{ trans('local.add_administrative') }}</a> --}}
                       <div class="table-responsive">
                           <table id="dynamic-table" class="table table-striped dataex-html5-selectors">
                               <thead>
                                   <tr>
                                        <th><input type="checkbox" class="ace" /></th>
                                        <th>#</th>
                                        {{-- <th>{{ trans('local.name') }}</th> --}}
                                        <th>{{ trans('local.email') }}</th>
                                        <th>{{ trans('local.username') }}</th>
                                        <th>{{ trans('local.status') }}</th>
                                        <th>{{ trans('local.edit') }}</th>
                                   </tr>
                               </thead>
                               <tbody></tbody>
                           </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(function () {
        var myTable = $('#dynamic-table').DataTable({
        @include('admin.datatables._config')
        buttons: [
                // new btn
                {
                    "text": "{{trans('local.add_administrative')}}",
                    "className": "btn btn-success square mr-1",
                    action : function ( e, dt, node, config ) {
                        window.location.href = "{{route('administrators.create')}}";
                        }
                },
                // delete btn

                // default btns
                @include('admin.datatables._buttons')
            ],
          ajax: "{{ route('administrators.index') }}",
          columns: [
              {data: 'check',       name: 'check', orderable: false, searchable: false},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            //   {data: 'admin_name',  name: 'admin_name'},
              {data: 'email', 		name: 'email'},
              {data: 'username',    name: 'username'},
              {data: 'status', 	    name: 'status'},
              {data: 'action', 	    name: 'action', orderable: false, searchable: false},
          ],
          @include('admin.datatables._lang')
      });
    //   @include('admin.datatables._multi-select')
    });
</script>
@include('admin.datatables._links')
@endsection
