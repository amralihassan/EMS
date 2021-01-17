<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\SchoolRequest;
use Student\Models\Settings\Operations\SchoolOp;
use Student\Models\Settings\School;

class SchoolController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-school', ['only' => ['index']]);
        // $this->middleware('permission:add-school', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-school', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-school', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = SchoolOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.schools.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('schools.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('school_name', function ($data) {
                return $data->school_name;
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'school_name'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = new School();
        return view('student::settings.schools.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        SchoolOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('schools.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = SchoolOp::_fetchById($id);
        return view('student::settings.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(schoolRequest $request, $id)
    {
        SchoolOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('schools.index');
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
                $status = SchoolOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
