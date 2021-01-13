{{-- general settings --}}
<tr>
    <td>{{ trans('local.general_settings') }}</td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 1, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="1">
        </fieldset>
    </td>
    <td>-</td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember"  {{in_array( 2, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="2">
        </fieldset>
    </td>
    <td>-</td>
</tr>
{{-- manage admins --}}
<tr>
    <td>{{ trans('local.manage_admins') }}</td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 3, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="3">
        </fieldset>
    </td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 4, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="4">
        </fieldset>
    </td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 5, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="5">
        </fieldset>
    </td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 6, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="6">
        </fieldset>
    </td>
</tr>
{{-- roles --}}
<tr>
    <td>{{ trans('local.roles') }}</td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 7, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="7">
        </fieldset>
    </td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 8, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="8">
        </fieldset>
    </td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 9, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="9">
        </fieldset>
    </td>
    <td>
        <fieldset>
            <input type="checkbox" class="chk-remember" {{in_array( 10, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''}} name="permissions[]" value="10">
        </fieldset>
    </td>
</tr>
