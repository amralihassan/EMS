<?php

namespace Student\Models\Parents\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Parents\Guardian;

class GuardianOp extends Guardian implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return [
            'full_name',
            'type',
            'id_type',
            'id_number',
            'mobile1',
            'mobile2',
            'job',
            'email',
            'block_no',
            'street_name',
            'state',
            'government',
            'admin_id',
        ];
    }

    public static function _fetchAll()
    {
        return Guardian::latest();
    }

    public static function _fetchById($id)
    {
        return Guardian::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->guardians()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->update($request->only(self::attributes()));
        return true;
    }

    public static function _destroy($id)
    {
        foreach (request('id') as $id) {
            Guardian::destroy($id);
        }
        return true;
    }

}
