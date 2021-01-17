<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Student\Http\Requests\NationalityRequest;
use Student\Models\Settings\Nationality;
use Student\Models\Settings\Operations\NationalityOp;

class NationalityController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-nationality', ['only' => ['index']]);
        // $this->middleware('permission:add-nationality', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-nationality', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-nationality', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = NationalityOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.nationalities.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('nationalities.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('male_nationality', function ($data) {
                return $data->male_nationality;
            })
            ->addColumn('female_nationality', function ($data) {
                return $data->female_nationality;
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'male_nationality', 'female_nationality'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationality = new Nationality();
        return view('student::settings.nationalities.create', compact('nationality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NationalityRequest $request)
    {
        NationalityOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('nationalities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationality = NationalityOp::_fetchById($id);
        return view('student::settings.nationalities.edit', compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NationalityRequest $request, $id)
    {
        NationalityOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('nationalities.index');
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
                $status = NationalityOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
