<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\LanguageRequest;
use Student\Models\Settings\Language;
use Student\Models\Settings\Operations\LanguageOp;

class LanguageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-language', ['only' => ['index']]);
        // $this->middleware('permission:add-language', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-language', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-language', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = LanguageOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.languages.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('languages.edit', $data->id) . '">
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
        $language = new Language();
        return view('student::settings.languages.create', compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        LanguageOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('languages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = LanguageOp::_fetchById($id);
        return view('student::settings.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {
        LanguageOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('languages.index');
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
                $status = LanguageOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
