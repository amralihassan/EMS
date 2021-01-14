<?php
namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\YearRequest;
use Student\Models\Settings\Operations\YearOp;
use Student\Models\Settings\Year;

class YearController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-year', ['only' => ['index']]);
        // $this->middleware('permission:add-year', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-year', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-year', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = YearOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.academic-years.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('academic-years.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('active_year', function ($data) {
                return $data->active_year == trans('student::local.current') ?
                '<span class="badge badge-success">' . trans('student::local.current') . '</span>' :
                '<span class="badge badge-danger">' . trans('student::local.not_current') . '</span>';
            })
            ->addColumn('open_close_year', function ($data) {
                return $data->open_close_year == trans('student::local.open') ?
                '<span class="badge badge-success">' . trans('student::local.open') . '</span>' :
                '<span class="badge badge-danger">' . trans('student::local.close') . '</span>';
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'active_year', 'open_close_year'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = new Year;
        return view('student::settings.academic-years.create', compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(YearRequest $request)
    {
        YearOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('academic-years.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = YearOp::_fetchById($id);
        return view('student::settings.academic-years.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(YearRequest $request, $id)
    {
        YearOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('academic-years.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if (request()->ajax()) {
            if (request()->has('id')) {
                $status = YearOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
