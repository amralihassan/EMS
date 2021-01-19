<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Year;

class YearOp extends Year implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['name', 'start_from', 'end_in', 'active_year', 'admin_id', 'open_close_year'];
    }

    public static function _fetchAll()
    {
        return Year::orderBy('id', 'desc')->get();
    }

    public static function _fetchById($id)
    {
        return Year::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->years()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $year = Year::findOrFail($id);
        $year->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Year::destroy($id);
        }
        return true;
    }
}
