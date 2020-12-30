<?php

namespace App\Http\Models\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use App\Http\Models\Entities\Employee;


class EmployeeOperations extends Employee implements IMainOperations, IFetchData
{
    public static function _fetchAll()
    {
        return Employee::sort()->get();
    }

    public static function _fetchById($id)
    {
        return Employee::findOrFail($id);
    }

    public static function _fetchAllByQuery($where)
    {
        return Employee::where($where)->get();
    }

    public static function _store($request)
    {
        Employee::create($request->all());
        return true;
    }

    public static function _update($employee, $request)
    {
        $employee->update($request->all());
        return true;
    }

    public static function _destroy($id)
    {
    }
}
