<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        {{-- dashboard --}}
        <li class=" nav-item {{request()->segment(2) == 'dashboard' ? 'active':''}}"><a href="{{route('students.dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('local.dashboard') }}</span></a></li>

        {{-- parents --}}
        <li class=" nav-item {{request()->segment(2) == 'parents' ? 'active':''}}"><a href="{{route('parents.index')}}"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('student::local.parents') }}</span></a></li>

        {{-- calc student age --}}
        <li class=" nav-item {{request()->segment(2) == 'calculate-student-age' ? 'active':''}}"><a href="{{route('calc-age.index')}}"><i class="la la-calculator"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('student::local.calc_student_age') }}</span></a></li>

        {{-- settings --}}
        <li class=" nav-item"><a href="index.html"><i class="la la-gears"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('local.settings') }}</span></a>
            <ul class="menu-content">
                <li class="{{request()->segment(3) == 'academic-years' ? 'active':''}}"><a class="menu-item" href="{{route('academic-years.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.years') }}</a></li>
                <li class="{{request()->segment(3) == 'divisions' ? 'active':''}}"><a class="menu-item" href="{{route('divisions.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.divisions') }}</a></li>
                <li class="{{request()->segment(3) == 'stages' ? 'active':''}}"><a class="menu-item" href="{{route('stages.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.stages') }}</a></li>
                <li class="{{request()->segment(3) == 'grades' ? 'active':''}}"><a class="menu-item" href="{{route('grades.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.grades') }}</a></li>
                <li class="{{request()->segment(3) == 'classrooms' ? 'active':''}}"><a class="menu-item" href="{{route('classrooms.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.classrooms') }}</a></li>
                <li class="{{request()->segment(3) == 'interviews' ? 'active':''}}"><a class="menu-item" href="{{route('interviews.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.interviews') }}</a></li>
                <li class="{{request()->segment(3) == 'languages' ? 'active':''}}"><a class="menu-item" href="{{route('languages.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.languages') }}</a></li>
                <li class="{{request()->segment(3) == 'nationalities' ? 'active':''}}"><a class="menu-item" href="{{route('nationalities.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.nationalities') }}</a></li>
                <li class="{{request()->segment(3) == 'registration-status' ? 'active':''}}"><a class="menu-item" href="{{route('registration-status.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.registration_status') }}</a></li>
                <li class="{{request()->segment(3) == 'schools' ? 'active':''}}"><a class="menu-item" href="{{route('schools.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.schools') }}</a></li>
                <li class="{{request()->segment(3) == 'steps' ? 'active':''}}"><a class="menu-item" href="{{route('steps.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.steps') }}</a></li>
                <li class="{{request()->segment(3) == 'subjects' ? 'active':''}}"><a class="menu-item" href="{{route('subjects.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.subjects') }}</a></li>
                <li class="{{request()->segment(3) == 'submission-tests' ? 'active':''}}"><a class="menu-item" href="{{route('submission-tests.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.submission_tests') }}</a></li>
                <li class="{{request()->segment(3) == 'admission-documents' ? 'active':''}}"><a class="menu-item" href="{{route('admission-documents.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.admission_documents') }}</a></li>
                <li class="{{request()->segment(3) == 'id-cards-designs' ? 'active':''}}"><a class="menu-item" href="{{route('id-cards-designs.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.id_cards_design') }}</a></li>
            </ul>
        </li>


      </ul>
    </div>
  </div>
