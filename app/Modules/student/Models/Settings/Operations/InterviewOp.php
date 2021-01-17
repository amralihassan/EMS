<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Interview;

class InterviewOp extends Interview implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Interview::sort()->get();
    }

    public static function _fetchById($id)
    {
        return Interview::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->interviews()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $interview = Interview::findOrFail($id);
        $interview->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Interview::destroy($id);
        }
        return true;
    }
}
