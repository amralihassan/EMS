<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\AdmissionDocumentRequest;
use Student\Models\Settings\AdmissionDocument;
use Student\Models\Settings\Operations\AdmissionDocumentOp;
use Student\Models\Settings\Operations\GradeOp;

class AdmissionDocumentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-admission-document', ['only' => ['index']]);
        // $this->middleware('permission:add-admission-document', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-admission-document', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-admission-document', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = AdmissionDocumentOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('student::settings.admission-documents.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('admission-documents.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('document_name', function ($data) {
                return $data->document_name;
            })
            ->addColumn('grades', function ($data) {
                return $this->grades($data);
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'document_name', 'grades'])
            ->make(true);
    }

    private function grades($data)
    {
        $grades = '';
        foreach ($data->grades as $grade) {
            $grades .= ' <div class="badge badge-info">' . $grade->grade_name . '</div> ';
        }
        return $grades;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = GradeOp::_fetchAll();
        $admission_document = new AdmissionDocument();
        return view('student::settings.admission-documents.create', compact('admission_document', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdmissionDocumentRequest $request)
    {
        AdmissionDocumentOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('admission-documents.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grades = GradeOp::_fetchAll();
        $admission_document = AdmissionDocumentOp::_fetchById($id);
        return view('student::settings.admission-documents.edit', compact('admission_document', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdmissionDocumentRequest $request, $id)
    {
        AdmissionDocumentOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('admission-documents.index');
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
                $status = AdmissionDocumentOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
