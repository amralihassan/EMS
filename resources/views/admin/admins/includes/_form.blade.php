<h4 class="form-section">{{ trans('local.user_info') }}</h4>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
        <label>{{ trans('local.en_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('local.en_name') }}" name="en_name" value="{{old('en_name', $admin->en_name)}}">
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
        <label>{{ trans('local.ar_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('local.ar_name') }}" name="ar_name" value="{{old('ar_name', $admin->ar_name)}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
        <label>{{ trans('local.prefer_lang') }}</label>
        <select name="lang" required class="form-control">
            <option>{{ trans('local.select') }}</option>
            <option {{ (old('lang', $admin->lang) == 'en')?'selected':''}} value="en">{{ trans('local.en') }}</option>
            <option {{ (old('lang', $admin->lang) == 'ar')?'selected':''}} value="ar">{{ trans('local.ar') }}</option>
        </select>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
        <label>{{ trans('local.status') }}</label>
        <select name="status" class="form-control">
            <option value="">{{ trans('local.select') }}</option>
            <option {{ (old('status', $admin->status) == trans('local.enable'))?'selected':''}} value="enable">{{ trans('local.enable') }}</option>
            <option {{ (old('status', $admin->status) == trans('local.disable'))?'selected':''}} value="disable">{{ trans('local.disable') }}</option>
        </select>
        </div>
    </div>
</div>

<h4 class="form-section">{{ trans('local.account_info') }}</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
        <label>{{ trans('local.email') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('local.email') }}" name="email" value="{{old('email',$admin->email)}}">
        </div>
    </div>
    @if ($active)
        <div class="col-md-4">
            <div class="form-group">
            <label>{{ trans('local.username') }}</label>
            <input type="text" class="form-control" placeholder="{{ trans('local.username') }}" name="username" value="{{old('username')}}">
            </div>
        </div>
    @endif
</div>
@if ($active)
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>{{ trans('local.password') }}</label>
            <input type="password" class="form-control" placeholder="{{ trans('local.password') }}" name="password">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            <label>{{ trans('local.confirm_password') }}</label>
            <input type="password" class="form-control" placeholder="{{ trans('local.confirm_password') }}" name="confirm_password">
            </div>
        </div>
    </div>
@endif
