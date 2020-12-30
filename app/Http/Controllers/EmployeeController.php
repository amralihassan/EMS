<?php

namespace App\Http\Controllers;

use App\Http\Models\Entities\Employee;
use App\Http\Models\Operations\EmployeeOperations;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        return EmployeeOperations::_fetchAll();
    }

    public function show($id)
    {
        $where = [
            ['id', $id]
        ];
        return EmployeeOperations::_fetchAllByQuery($where);
    }
    public function store(EmployeeRequest $request)
    {
        $employee =  EmployeeOperations::_store($request);
        return $employee == 1 ? 'Saved Successfully' : 'Error';
    }
    public function update(Employee $employee, EmployeeRequest $request)
    {
        $employee = EmployeeOperations::_update($employee, $request);
        return $employee == 1 ? 'Updated Successfully' : 'Error';
    }
}
