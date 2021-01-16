<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\StageRequest;
use Student\Models\Settings\Operations\StageOp;
use Student\Models\Settings\Stage;

class StageController extends Controller
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
            $data = StageOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.stages.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('stages.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('stage_name', function ($data) {
                return $data->stage_name;
            })

            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'stage_name'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stage = new Stage();
        return view('student::settings.stages.create', compact('stage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequest $request)
    {
        StageOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('stages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stage = StageOp::_fetchById($id);
        return view('student::settings.stages.edit', compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StageRequest $request, $id)
    {
        StageOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('stages.index');
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
                $status = StageOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
