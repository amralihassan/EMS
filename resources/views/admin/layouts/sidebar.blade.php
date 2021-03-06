<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item {{request()->segment(2) == 'dashboard' ? 'active':''}}"><a href="{{route('dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('local.dashboard') }}</span></a></li>
        @if (authInfo()->isAbleTo('view-admins'))
            <li class=" nav-item"><a href="index.html"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('local.manage_admins') }}</span></a>
                <ul class="menu-content">
                    <li class="{{request()->segment(2) == 'administrators' ? 'active':''}}"><a class="menu-item" href="{{route('administrators.index')}}" data-i18n="nav.dash.ecommerce">{{ trans('local.admins') }}</a></li>
                    {{-- <li class="{{request()->segment(2) == 'parents-accounts' ? 'active':''}}"><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">{{ trans('local.parents') }}</a></li> --}}
                    {{-- <li class="{{request()->segment(2) == 'student-accounts' ? 'active':''}}"><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">{{ trans('local.students') }}</a></li> --}}
                </ul>
            </li>
        @endif
        @if (authInfo()->isAbleTo('view-setting'))
            <li class=" nav-item {{request()->segment(2) == 'general-settings' ? 'active':''}}"><a href="{{route('general.settings')}}"><i class="la la-gear"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('local.general_settings') }}</span></a></li>
        @endif

        <li class=" nav-item {{request()->segment(2) == 'activities-logs' ? 'active':''}}"><a href="{{route('activities.logs')}}"><i class="la la-history"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('local.activities_logs') }}</span></a></li>
        <li class=" nav-item {{request()->segment(2) == 'logs' ? 'active':''}}"><a href="{{route('logs')}}"><i class="la la-calendar"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{ trans('local.log_viewer') }}</span></a></li>

      </ul>
    </div>
  </div>
