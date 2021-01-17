<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\SubmissionTest;

class SubmissionTestOp extends SubmissionTest implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return SubmissionTest::sort()->get();
    }

    public static function _fetchById($id)
    {
        return SubmissionTest::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->submissionTests()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $submissionTest = SubmissionTest::findOrFail($id);
        $submissionTest->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            SubmissionTest::destroy($id);
        }
        return true;
    }
}
