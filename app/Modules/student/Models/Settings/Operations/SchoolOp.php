<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\School;

class SchoolOp extends School implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'school_type', 'school_government', 'school_address', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return School::all();
    }

    public static function _fetchById($id)
    {
        return School::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->schools()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $school = School::findOrFail($id);
        $school->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            School::destroy($id);
        }
        return true;
    }
}
