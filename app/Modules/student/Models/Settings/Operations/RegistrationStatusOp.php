<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\RegistrationStatus;

class RegistrationStatusOp extends RegistrationStatus implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'description', 'shown', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return RegistrationStatus::sort()->get();
    }

    public static function _fetchById($id)
    {
        return RegistrationStatus::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->registrationStatus()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $registration_status = RegistrationStatus::findOrFail($id);
        $registration_status->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            RegistrationStatus::destroy($id);
        }
        return true;
    }
}
