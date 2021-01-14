<div class="row">
    <div class="col-lg-4  col-md-6">
        <h4><strong>{{ trans('local.general_settings') }}</strong></h4>
        <ul class="none-style">
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 1, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="1">
                    <label>{{ trans('local.view_settings') }}</label>
                </fieldset>
            </li>
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 2, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="2">
                    <label>{{ trans('local.update_settings') }}</label>
                </fieldset>
            </li>
        </ul>
    </div>
    <div class="col-lg-4  col-md-6">
        <h4><strong>{{ trans('local.manage_admins') }}</strong></h4>
        <ul class="none-style">
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 3, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="3">
                    <label>{{ trans('local.view_admins') }}</label>
                </fieldset>
            </li>
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 4, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="4">
                    <label>{{ trans('local.add_admin') }}</label>
                </fieldset>
            </li>
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 5, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="5">
                    <label>{{ trans('local.edit_admin') }}</label>
                </fieldset>
            </li>
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 6, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="6">
                    <label>{{ trans('local.delete_admin') }}</label>
                </fieldset>
            </li>
        </ul>
    </div>
    <div class="col-lg-4  col-md-6">
        <h4><strong>{{ trans('local.roles') }}</strong></h4>
        <ul class="none-style">
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 7, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="7">
                    <label>{{ trans('local.view_roles') }}</label>
                </fieldset>
            </li>
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 8, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="8">
                    <label>{{ trans('local.add_role') }}</label>
                </fieldset>
            </li>
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 9, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="9">
                    <label>{{ trans('local.edit_role') }}</label>
                </fieldset>
            </li>
            <li>
                <fieldset>
                    <input type="checkbox" class="chk-remember"  {{in_array( 10, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="10">
                    <label>{{ trans('local.delete_roles') }}</label>
                </fieldset>
            </li>
        </ul>
    </div>

</div>

