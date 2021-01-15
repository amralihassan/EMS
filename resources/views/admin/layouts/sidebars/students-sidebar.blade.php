<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        {{-- dashboard --}}
        <li class=" nav-item {{request()->segment(2) == 'dashboard' ? 'active':''}}"><a href="{{route('students.dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('local.dashboard') }}</span></a></li>


        {{-- settings --}}
        <li class=" nav-item"><a href="index.html"><i class="la la-gears"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('local.settings') }}</span></a>
            <ul class="menu-content">
                <li class="{{request()->segment(3) == 'academic-years' ? 'active':''}}"><a class="menu-item" href="{{route('academic-years.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.years') }}</a></li>
                <li class="{{request()->segment(3) == 'divisions' ? 'active':''}}"><a class="menu-item" href="{{route('divisions.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('student::local.divisions') }}</a></li>
            </ul>
        </li>

      </ul>
    </div>
  </div>
