<?php

namespace Student\Http\Controllers;

use App\Http\Controllers\Controller;

class CalcStudentAgeController extends Controller
{
    public function index()
    {
        return view('student::age.calculate-age');
    }

    public function calculate()
    {
        if (request()->ajax()) {
            $dob = request('dob');
            $data = getStudentAge($dob);
            return response(['status' => true, 'data' => $data]);
        }
    }
}
