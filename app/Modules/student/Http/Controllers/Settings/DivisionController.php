<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\DivisionRequest;
use Student\Models\Settings\Division;
use Student\Models\Settings\Operations\DivisionOp;

class DivisionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-division', ['only' => ['index']]);
        // $this->middleware('permission:add-division', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-division', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-division', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = DivisionOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.divisions.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('divisions.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('division_name', function ($data) {
                return $data->division_name;
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
            ->rawColumns(['action', 'check', 'division_name', 'school_name'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = new Division();
        return view('student::settings.divisions.create', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionRequest $request)
    {
        DivisionOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('divisions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = DivisionOp::_fetchById($id);
        return view('student::settings.divisions.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionRequest $request, $id)
    {
        DivisionOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('divisions.index');
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
                $status = DivisionOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
