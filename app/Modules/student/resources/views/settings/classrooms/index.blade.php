@extends('admin.layouts.app')
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('sidebar')
@include('admin.layouts.sidebars.students-sidebar')
@endsection
@section('title',trans('student::local.classrooms'))
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{ trans('student::local.classrooms') }}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('students.dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('student::local.classrooms') }}</li>
          </ol>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('student::settings.classrooms.includes._filter')
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
                                <th>{{trans('student::local.classroom_name')}}</th>
                                <th>{{trans('student::local.division_name')}}</th>
                                <th>{{trans('student::local.grade_name')}}</th>
                                <th>{{trans('student::local.total_capacity')}}</th>
                                <th>{{trans('student::local.sort')}}</th>
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
                    "text": "{{trans('student::local.add_classroom')}}",
                    "className": "btn btn-success mr-1",
                    action : function ( e, dt, node, config ) {
                        window.location.href = "{{route('classrooms.create')}}";
                        }
                },
                // delete btn
                @include('student::settings.classrooms.includes._delete-btn')
                // default btns
                @include('admin.datatables._buttons')
            ],
            ajax: "{{ route('classrooms.index') }}",
            // columns
            @include('student::settings.classrooms.includes._columns')
            @include('admin.datatables._lang')
      });
      @include('admin.datatables._multi-select')
    });

    $('#division_id').on('change',function(){
      filter();
    });
    $('#grade_id').on('change',function(){
      filter();
    });
    $('#year_id').on('change',function(){
      filter();
    });
    $('#filter').on('click',function(){
      filter();
    });
    function filter()
    {
      $('#dynamic-table').DataTable().destroy();
        var grade_id 		= $('#grade_id').val();
        var division_id     = $('#division_id').val();
        var year_id 		= $('#year_id').val();

        var myTable = $('#dynamic-table').DataTable({
        @include('admin.datatables._config')
            buttons: [
                // new btn
                {
                    "text": "{{trans('student::local.add_classroom')}}",
                    "className": "btn btn-success mr-1",
                    action : function ( e, dt, node, config ) {
                        window.location.href = "{{route('classrooms.create')}}";
                        }
                },
                // delete btn
                @include('student::settings.classrooms.includes._delete-btn')
                // default btns
                @include('admin.datatables._buttons')
            ],

            ajax:{
                type:'POST',
                url:'{{route("classrooms.filter")}}',
                data: {
                    _method     : 'PUT',
                    grade_id    : grade_id,
                    division_id : division_id,
                    year_id     : year_id,
                    _token      : '{{ csrf_token() }}'
                }
              },
            // columns
            @include('student::settings.classrooms.includes._columns')
            @include('admin.datatables._lang')
      });
      @include('admin.datatables._multi-select')
    }

</script>
@include('admin.datatables._links')
@endsection

