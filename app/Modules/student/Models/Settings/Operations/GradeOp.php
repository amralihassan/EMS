<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Grade;

class GradeOp extends Grade implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'ar_online_name', 'en_online_name', 'from_age_year', 'from_age_month', 'to_age_year', 'to_age_month', 'sort', 'end_stage', 'admin_id', 'stage_id'];
    }

    public static function _fetchAll()
    {
        return Grade::sort()->get();
    }

    public static function _fetchById($id)
    {
        return Grade::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->grades()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $grades = Grade::findOrFail($id);
        $grades->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Grade::destroy($id);
        }
        return true;
    }
}
