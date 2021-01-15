<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Subject;

class SubjectOp extends Subject implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'ar_shortcut', 'en_shortcut', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Subject::latest();
    }

    public static function _fetchById($id)
    {
        return Subject::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->subjects()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Subject::destroy($id);
        }
        return true;
    }
}
