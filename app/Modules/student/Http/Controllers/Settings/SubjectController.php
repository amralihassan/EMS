<?php

namespace Student\Http\Controllers\Settings;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Student\Http\Requests\SubjectRequest;
use Student\Models\Settings\Subject;
use Student\Models\Settings\Operations\SubjectOp;

class SubjectController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-subject', ['only' => ['index']]);
        // $this->middleware('permission:add-subject', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-subject', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-subject', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = SubjectOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.subjects.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('subjects.edit', $data->id) . '">
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
        $subject = new Subject();
        return view('student::settings.subjects.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        SubjectOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('subjects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = SubjectOp::_fetchById($id);
        return view('student::settings.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        SubjectOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('subjects.index');
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
                $status = SubjectOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
