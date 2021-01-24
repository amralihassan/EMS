@extends('admin.layouts.app')
@section('title', trans('student::local.edit_student'))
@section('sidebar')
    @include('admin.layouts.sidebars.students-sidebar')
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ trans('student::local.edit_student') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ route('students.dashboard') }}">{{ trans('local.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('students.index') }}">{{ trans('local.students') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('student::local.edit_student') }}</li>
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
                        <form class="form" action="{{ route('students.update',$student->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                @include('student::students.includes._form')
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1"
                                    onclick="location.href='{{ route('students.index') }}';">
                                    <i class="ft-x"></i> {{ trans('local.cancel') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> {{ trans('local.save') }}
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
    <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-repeater.js') }}"></script>
    {{-- ICHECK --}}
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}">
    </script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-login-register.js') }}"></script>


    <script>
        $('#dob').on('change', function() {
            var dob = $('#dob').val();
            $.ajax({
                type: 'POST',
                url: '{{ route("calc-age-student") }}',
                data: {
                    _method: 'PUT',
                    dob: dob,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#dd').val(response.data.dd);
                    $('#mm').val(response.data.mm);
                    $('#yy').val(response.data.yy);
                }
            })

        })

        $(document).ready(function() {
            (function getDocumentSelected() {
                var id = "{{ $student->id }}";

                $.ajax({
                    type: 'POST',
                    url: '{{ route("get-document-selected") }}',
                    data: {
                        _method: 'PUT',
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#documentId').html(data);
                    }
                });
            }());

            (function getStepsSelected() {
                var id = "{{ $student->id }}";

                $.ajax({
                    type: 'POST',
                    url: '{{route("get-step-selected")}}',
                    data: {
                        _method: 'PUT',
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#stepId').html(data);
                    }
                });
            }());

            (function() {
                var dob = "{{ $student->dob }}";
                $.ajax({
                    type: 'POST',
                    url: '{{ route("calc-age-student") }}',
                    data: {
                        _method: 'PUT',
                        dob: dob,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#dd').val(response.data.dd);
                        $('#mm').val(response.data.mm);
                        $('#yy').val(response.data.yy);
                    }
                })
            }())
        })

    </script>
@endsection
