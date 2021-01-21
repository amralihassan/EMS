@extends('admin.layouts.app')
@section('title',trans('student::local.father_data'))
@section('sidebar')
    @include('admin.layouts.sidebars.students-sidebar')
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{ trans('student::local.father_data') }}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('students.dashboard')}}">{{ trans('local.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('parents.index')}}">{{ trans('local.parents') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('student::local.father_data') }}</li>
          </ol>
        </div>
      </div>
    </div>
</div>
{{-- buttons --}}
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
              <div class="col-md-12">
                  <h2 class="mb-2">{{$father->father_name}}
                  </h2>
              </div>
            <div class="col-md-12">
                <a href="#" class="mb-1 btn btn-success white"><i class="la la-graduation-cap"></i> {{ trans('student::local.add_son') }}</a>
                <a href="{{route('mother.create',$father->id)}}" class="mb-1 btn btn-secondary white"><i class="la la-female"></i> {{ trans('student::local.add_mother') }}</a>
                <a href="{{route('fathers.edit',$father->id)}}" class="mb-1 btn btn-warning white"><i class="la la-edit"></i> {{ trans('student::local.edit_father_data') }}</a>
                {{-- <a href="{{route('contacts.index',$father->id)}}" class="mb-1 btn btn-light white"><i class="la la-phone"></i> {{ trans('student::local.father_contacts') }}</a>
                <a href="{{route('father.meetings',$father->id)}}" class="mb-1 btn btn-primary white"><i class="la la-users"></i> {{ trans('student::local.meetings') }}</a>
                <a href="{{route('father.report',$father->id)}}" class="mb-1 btn btn-info white"><i class="la la-file"></i> {{ trans('student::local.pr_reports') }}</a>
                <a href="{{route('father-notes.index',$father->id)}}" class="mb-1 btn btn-dark white"><i class="la la-reorder"></i> {{ trans('student::local.notes') }}</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

{{-- father data --}}
<div class="row">
    <div class="col-lg-4 col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5> {{ trans('student::local.father_main_data') }}</h5>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.id_type') }} : {{$father->id_type}}</h6>
                      <h6>{{ trans('student::local.religion') }} :
                        {{$father->father_religion == 'muslim' ? trans('student::local.muslim') : trans('student::local.non_muslim')}}</h6>
                      <h6>{{ trans('student::local.job') }} : {{$father->father_job}}</h6>
                      <h6>{{ trans('student::local.facebook') }} : {{$father->father_facebook}}</h6>
                    </div>
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.id_number') }} : {{$father->father_id_number}}</h6>
                      <h6>{{ trans('student::local.nationality_id') }} : {{$father->nationality_name}}</h6>
                      <h6>{{ trans('student::local.qualification') }} : {{$father->father_qualification}}</h6>
                      <h6>{{ trans('student::local.whatsapp_number') }} : {{$father->father_whatsapp_number}}</h6>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5> {{ trans('student::local.contacts_data') }}</h5>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.home_phone') }} : {{$father->father_home_phone}}</h6>
                      <h6>{{ trans('student::local.mobile1') }} : {{$father->father_mobile1}}</h6>
                      <h6>{{ trans('student::local.block_no') }} : {{$father->father_block_no}}</h6>
                      <h6>{{ trans('student::local.state') }} : {{$father->father_state}}</h6>
                    </div>
                    <div class="col-md-6">
                      <h6>{{ trans('student::local.email') }} : {{$father->father_email}}</h6>
                      <h6>{{ trans('student::local.mobile2') }} : {{$father->father_mobile2}}</h6>
                      <h6>{{ trans('student::local.street_name') }} : {{$father->father_street_name}}</h6>
                      <h6>{{ trans('student::local.government') }} : {{$father->father_government}}</h6>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5> {{ trans('student::local.extra_info') }}</h5>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <h6>{{ trans('student::local.educational_mandate') }} : {{$father->educational_mandate}}</h6>
                      <h6>{{ trans('student::local.marital_status') }} : {{$father->marital_status}}</h6>
                      <h6>{{ trans('student::local.recognition') }} : {{$father->recognition}}</h6>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

{{-- sons --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
            <h3 class="center blue"> {{ trans('student::local.sons') }}</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>{{ trans('student::local.student_image') }}</th>
                    <th>{{ trans('student::local.student_number') }}</th>
                    <th>{{ trans('student::local.student_name') }}</th>
                    <th>{{ trans('student::local.registration_status') }}</th>
                    <th>{{ trans('student::local.grade_name') }}</th>
                    <th>{{ trans('student::local.division_name') }}</th>
                    <th>{{ trans('student::local.mother_name') }}</th>
                    <th>{{ trans('student::local.dob') }}</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($father->students as $student)
                    <tr>
                      <td width="25">
                        @empty($student->student_image)
                            <a href="{{route('students.show',$student->id)}}">
                                <img width="50" class="editable img-responsive sibling-image" alt="Alex's Avatar" id="avatar2"
                                src="{{asset('images/studentsImages/37.jpeg')}}" />
                            </a>
                        @else
                            <a href="{{route('students.show',$student->id)}}">
                                <img width="50" class="editable img-responsive sibling-image" alt="Alex's Avatar" id="avatar2"
                                src="{{asset('images/studentsImages/'.$student->student_image)}}" />
                            </a>
                        @endempty
                      </td>
                      <td>
                        {{$student->student_number}}
                      </td>
                      <td>
                        <a href="{{route('students.show',$student->id)}}">{{session('lang') == 'ar'?$student->ar_student_name:$student->en_student_name }}</a>
                      </td>
                      <td>
                        {{session('lang') == 'ar'?$student->regStatus->ar_name_status:$student->regStatus->en_name_status }}
                      </td>
                      <td>
                        {{session('lang') == 'ar'?$student->grade->ar_grade_name:$student->grade->en_grade_name }}
                      </td>
                      <td>
                        {{session('lang') == 'ar'?$student->division->ar_division_name:$student->division->en_division_name }}
                      </td>
                      <td>
                        <a href="{{route('mother.show',$student->mother_id)}}">{{$student->mother->full_name}}</a>
                      </td>
                      <td>{{$student->dob}}</td>
                      <td>
                        @if ($student->twins=='true' )
                            <a href="{{route('students.show',$student->id)}}">
                                <img width="50" class="editable img-responsive sibling-image" alt="Alex's Avatar" id="avatar2"
                                src="{{asset('images/website/twins.png')}}" />
                            </a>
                        @endif
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
