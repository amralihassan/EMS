@extends('admin.layouts.app')
@section('title',trans('student::local.mother_data'))
@section('sidebar')
    @include('admin.layouts.sidebars.students-sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{ trans('student::local.mother_data') }}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('students.dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('parents.index')}}">{{ trans('local.parents') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('student::local.mother_data') }}</li>
          </ol>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
              <div class="col-md-12">
                  <h2 class="mb-2">{{$mother->full_name}}</h2>
              </div>
            <div class="col-md-12">
                <a href="#" class="btn btn-secondary white"><i class="la la-female"></i> {{ trans('student::local.add_father') }}</a>
                <a href="{{route('mothers.edit',$mother->id)}}" class="btn btn-warning white"><i class="la la-edit"></i> {{ trans('student::local.edit_mother_data') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5> {{ trans('student::local.mother_main_data') }}</h5>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.id_type') }} : {{$mother->id_type}}</h6>
                      <h6>{{ trans('student::local.religion') }} :
                        {{$mother->mother_religion == 'muslim' ? trans('student::local.muslim') : trans('student::local.non_muslim')}}</h6>
                      <h6>{{ trans('student::local.job') }} : {{$mother->mother_job}}</h6>
                      <h6>{{ trans('student::local.facebook') }} : {{$mother->mother_facebook}}</h6>
                    </div>
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.id_number') }} : {{$mother->mother_id_number}}</h6>
                      <h6>{{ trans('student::local.nationality_id') }} : {{$mother->nationality_name}}</h6>
                      <h6>{{ trans('student::local.qualification') }} : {{$mother->mother_qualification}}</h6>
                      <h6>{{ trans('student::local.whatsapp_number') }} : {{$mother->mother_whatsapp_number}}</h6>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5> {{ trans('student::local.contacts_data') }}</h5>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.home_phone') }} : {{$mother->mother_home_phone}}</h6>
                      <h6>{{ trans('student::local.mobile1') }} : {{$mother->mother_mobile1}}</h6>
                      <h6>{{ trans('student::local.block_no') }} : {{$mother->mother_block_no}}</h6>
                      <h6>{{ trans('student::local.state') }} : {{$mother->mother_state}}</h6>
                    </div>
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.email') }} : {{$mother->mother_email}}</h6>
                      <h6>{{ trans('student::local.mobile2') }} : {{$mother->mother_mobile2}}</h6>
                      <h6>{{ trans('student::local.street_name') }} : {{$mother->mother_street_name}}</h6>
                      <h6>{{ trans('student::local.government') }} : {{$mother->mother_government}}</h6>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
            <h4 class="center blue"> {{ trans('student::local.sons') }}</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>{{ trans('student::local.student_number') }}</th>
                    <th>{{ trans('student::local.student_name') }}</th>
                    <th>{{ trans('student::local.father_name') }}</th>
                    <th>{{ trans('student::local.registration_status') }}</th>
                    <th>{{ trans('student::local.grade_name') }}</th>
                    <th>{{ trans('student::local.division_name') }}</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($mother->fathers as $father)
                      @foreach ($father->students as $student)
                        @if ($mother->id == $student->mother_id)
                          <tr>
                              {{-- stuednt number --}}
                              <td>{{$student->student_number}}</td>
                              {{-- student name --}}
                              <td>
                                <a href="{{route('students.show',$student->id)}}">{{session('lang') == 'ar' ? $student->ar_student_name : $student->en_student_name}}</a>
                              </td>
                              {{-- father name --}}
                              <td>
                                {{-- {{dd($student->father->id)}} --}}
                                    {{-- father name --}}
                                    <a href="{{route('father.show',$student->father->id)}}">{{$student->father->father_name}}</a>

                              </td>
                              {{-- status --}}
                              <td>
                                  {{session('lang') == 'ar'?$student->regStatus->ar_name_status:$student->regStatus->en_name_status }}
                              </td>
                              {{-- grade --}}
                              <td>{{$student->grade->grade_name }}</td>
                              {{-- division --}}
                              <td>
                                {{$student->division_name }}
                              </td>
                              <td>
                                @if ($student->twins=='true' )
                                    <a href="{{route('students.show',$student->id)}}">
                                        <img width="50" class="editable img-responsive sibling-image" alt="Alex's Avatar" id="avatar2"
                                        src="{{asset('storage/student-images  /twins.png')}}" />
                                    </a>
                                @endif
                              </td>
                          </tr>
                        @endif
                      @endforeach
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
