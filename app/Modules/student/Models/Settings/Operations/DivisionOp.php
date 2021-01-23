<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Division;

class DivisionOp extends Division implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'sort', 'total', 'ar_school_name', 'en_school_name', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Division::sort()->get();
    }

    public static function _fetchById($id)
    {
        return Division::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->divisions()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $division = Division::findOrFail($id);
        $division->update($request->only(self::attributes()));
        return true;
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Division::destroy($id);
        }
        return true;
    }
}
