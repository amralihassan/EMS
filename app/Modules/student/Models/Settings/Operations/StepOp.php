<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use DB;
use Student\Models\Settings\Step;

class StepOp extends Step implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Step::sort()->get();
    }

    public static function _fetchById($id)
    {
        return Step::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->steps()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $step = Step::findOrFail($id);
        $step->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Step::destroy($id);
        }
        return true;
    }

    public static function _fetchByQuery($student_id, $step_id)
    {
        return DB::table('student_step')->select('step_id')
            ->where('student_id', $student_id)->where('step_id', $step_id)->first();
    }
}
