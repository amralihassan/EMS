<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Classroom;

class ClassroomOp extends Classroom implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'sort', 'total', 'division_id', 'grade_id', 'year_id', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Classroom::with('division', 'grade')->sort()->get();
    }

    public static function _fetchById($id)
    {
        return Classroom::findOrFail($id);
    }

    public static function _fetchByQuery()
    {
        $classrooms = Classroom::with('division', 'grade')->sort();

        if (!empty(request('division_id'))) {
            $classrooms->where('division_id', request('division_id'));
        }

        if (!empty(request('grade_id'))) {
            $classrooms->where('grade_id', request('grade_id'));
        }

        return $classrooms->get();
    }

    public static function _store($request)
    {
        $request->user()->classrooms()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Classroom::destroy($id);
        }
        return true;
    }
}
