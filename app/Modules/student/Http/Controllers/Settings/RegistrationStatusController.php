<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Student\Http\Requests\RegistrationStatusRequest;
use Student\Models\Settings\Operations\RegistrationStatusOp;
use Student\Models\Settings\RegistrationStatus;

class RegistrationStatusController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-registration-status', ['only' => ['index']]);
        // $this->middleware('permission:add-registration-status', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-registration-status', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-registration-status', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = RegistrationStatusOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.registration-status.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('registration-status.edit', $data->id) . '">
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
        $registration_status = new RegistrationStatus();
        return view('student::settings.registration-status.create', compact('registration_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationStatusRequest $request)
    {
        RegistrationStatusOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('registration-status.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration_status = RegistrationStatusOp::_fetchById($id);
        return view('student::settings.registration-status.edit', compact('registration_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegistrationStatusRequest $request, $id)
    {
        RegistrationStatusOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('registration-status.index');
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
                $status = RegistrationStatusOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
