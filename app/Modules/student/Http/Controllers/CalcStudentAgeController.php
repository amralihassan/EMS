<?php

namespace Student\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Student\Models\Settings\Year;

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
            $data = $this->getStudentAge($dob);
            return response(['status' => true, 'data' => $data]);
        }
    }

    private function getStudentAge($dob)
    {
        $dob_in = Year::current()->first()->start_from;
        $dobObject = new \DateTime($dob);
        $now = new Carbon($dob_in);
        $thisYear = $now->year;
        $nowObject = Carbon::create($thisYear, 10, 1, 0, 0, 0);
        $diff = $dobObject->diff($nowObject);
        $data['dd'] = $diff->d;
        $data['mm'] = $diff->m;
        $data['yy'] = $diff->y;

        return $data;
    }
}
