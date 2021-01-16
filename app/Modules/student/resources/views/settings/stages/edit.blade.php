@extends('admin.layouts.app')
@section('title', trans('student::local.edit_stage'))
@section('sidebar')
@include('admin.layouts.sidebars.students-sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{trans('student::local.edit_stage')}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('stages.index')}}">{{ trans('student::local.stages') }}</a></li>
            <li class="breadcrumb-item active">{{trans('student::local.edit_stage')}}
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
            <form class="form" action="{{route('stages.update',$stage->id)}}" method="POST">
              @csrf
              @method('PUT')
                <div class="form-body">
                    @include('student::settings.stages.includes._form')
                </div>
              <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1" onclick="location.href='{{route('stages.index')}}';">
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
<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor', {
        language: "{{ session('lang') }}",
        toolbar: [{
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup'],
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                    'RemoveFormat'
                ]
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                    'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                    '-', 'BidiLtr', 'BidiRtl', 'Language'
                ]
            },
            {
                name: 'styles',
                items: ['FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor']
            },
            {
                name: 'tools',
                items: ['Maximize']
            },
        ]
    });

</script>
@endsection
