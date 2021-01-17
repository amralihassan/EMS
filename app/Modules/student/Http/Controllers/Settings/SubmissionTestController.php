<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Student\Http\Requests\SubmissionTestRequest;
use Student\Models\Settings\Operations\SubmissionTestOp;
use Student\Models\Settings\SubmissionTest;

class SubmissionTestController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-submission-test', ['only' => ['index']]);
        // $this->middleware('permission:add-submission-test', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-submission-test', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-submission-test', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = SubmissionTestOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.submission-tests.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('submission-tests.edit', $data->id) . '">
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
        $submission_test = new SubmissionTest();
        return view('student::settings.submission-tests.create', compact('submission_test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmissionTestRequest $request)
    {
        SubmissionTestOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('submission-tests.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submission_test = SubmissionTestOp::_fetchById($id);
        return view('student::settings.submission-tests.edit', compact('submission_test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmissionTestRequest $request, $id)
    {
        SubmissionTestOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('submission-tests.index');
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
                $status = SubmissionTestOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
