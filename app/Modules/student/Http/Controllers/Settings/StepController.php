<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\StepRequest;
use Student\Models\Settings\Operations\StepOp;
use Student\Models\Settings\Step;

class StepController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-step', ['only' => ['index']]);
        // $this->middleware('permission:add-step', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-step', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-step', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = StepOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.steps.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('steps.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('step_name', function ($data) {
                return $data->step_name;
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'step_name'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $step = new Step();
        return view('student::settings.steps.create', compact('step'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepRequest $request)
    {
        StepOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('steps.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $step = StepOp::_fetchById($id);
        return view('student::settings.steps.edit', compact('step'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StepRequest $request, $id)
    {
        StepOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('steps.index');
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
                $status = StepOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
