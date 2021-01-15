<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Stage;

class StageOp extends Stage implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'sort', 'signatures', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Stage::latest();
    }

    public static function _fetchById($id)
    {
        return Stage::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->stages()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $stage = Stage::findOrFail($id);
        $stage->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Stage::destroy($id);
        }
        return true;
    }
}
