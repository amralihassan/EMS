<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\InterviewRequest;
use Student\Models\Settings\Interview;
use Student\Models\Settings\Operations\InterviewOp;

class InterviewController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-interview', ['only' => ['index']]);
        // $this->middleware('permission:add-interview', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-interview', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-interview', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = InterviewOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.interviews.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('interviews.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interview = new Interview();
        return view('student::settings.interviews.create', compact('interview'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterviewRequest $request)
    {
        InterviewOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('interviews.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interview = InterviewOp::_fetchById($id);
        return view('student::settings.interviews.edit', compact('interview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InterviewRequest $request, $id)
    {
        InterviewOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('interviews.index');
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
                $status = InterviewOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
