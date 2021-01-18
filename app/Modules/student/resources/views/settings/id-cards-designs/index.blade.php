@extends('admin.layouts.app')
@section('title',trans('student::local.id_cards_design'))
@section('sidebar')
    @include('admin.layouts.sidebars.students-sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{ trans('student::local.id_cards_design') }}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('students.dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('student::local.id_cards_design') }}</li>
          </ol>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('student::settings.id-cards-designs.includes._filter')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
                <div class="row">
                    @forelse ($designs as $design)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                            <div class="card-content">
                                <a href="#">
                                    <img class="card-img-top img-fluid" src="{{asset('storage/id-designs/'.$design->file_name)}}"
                                alt="Card image cap"></a>
                                <div class="card-body">
                                <p>
                                    @foreach ($design->divisions as $division)
                                    <div class="badge badge-info"> {{$division->division_name}} </div>
                                    @endforeach
                                    <br>
                                    @foreach ($design->grades as $grade)
                                    <div class="badge badge-primary"> {{$grade->grade_name}} </div>
                                    @endforeach
                                </p>

                                <form action="{{route('id-cards-designs.destroy',$design->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('id-cards-designs.edit',$design->id)}}"class="btn btn-warning btn-sm ">{{ trans('local.edit') }}</a>
                                    <button id="btnDelete" type="submit" class="btn btn-danger btn-sm ">{{ trans('local.delete') }}</button>
                                </form>

                                </div>
                            </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-12">
                        <div class="alert bg-info alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                            <span class="alert-icon"><i class="la la-info-circle"></i></span>
                            <h5 class="white">{{ trans('student::local.no_id_cards_designs') }}</h5>
                        </div>
                    </div>
                    @endforelse


                </div>
                {{$designs->links()}}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
