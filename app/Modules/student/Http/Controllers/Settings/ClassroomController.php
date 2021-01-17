<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\ClassroomRequest;
use Student\Models\Settings\Classroom;
use Student\Models\Settings\Operations\ClassroomOp;

class ClassroomController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-classroom', ['only' => ['index']]);
        // $this->middleware('permission:add-classroom', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-classroom', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-classroom', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = ClassroomOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.classrooms.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('classrooms.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('grade_name', function ($data) {
                return $data->grade_name;
            })
            ->addColumn('division_name', function ($data) {
                return $data->division_name;
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'grade_name', 'division_name'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = new Classroom();
        return view('student::settings.classrooms.create', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {
        ClassroomOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('classrooms.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = ClassroomOp::_fetchById($id);
        return view('student::settings.classrooms.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, $id)
    {
        ClassroomOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('classrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if (request()->ajax()) {
            if (request()->has('id')) {
                $status = ClassroomOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
