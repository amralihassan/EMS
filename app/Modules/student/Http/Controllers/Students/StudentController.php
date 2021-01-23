<?php
namespace Student\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Cache;
use Student\Models\Parents\Operations\GuardianOp;
use Student\Models\Parents\Operations\MotherOp;
use Student\Models\Settings\Operations\AdmissionDocumentOp;
use Student\Models\Settings\Operations\DivisionOp;
use Student\Models\Settings\Operations\GradeOp;
use Student\Models\Settings\Operations\LanguageOp;
use Student\Models\Settings\Operations\NationalityOp;
use Student\Models\Settings\Operations\RegistrationStatusOp;
use Student\Models\Settings\Operations\SchoolOp;
use Student\Models\Settings\Operations\StepOp;
use Student\Models\Student\Operations\StudentOp;
use Student\Models\Student\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-student', ['only' => ['index']]);
        // $this->middleware('permission:add-student', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-student', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-student', ['only' => ['destroy']]);

        // USE REDIS SERVER TO FETCH STUDENT DATA
        if (!Cache::has('students')) {
            $students = StudentOp::_fetchAll();
            Cache::remember('students', 3600, function () use ($students) {
                return $students;
            });
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Cache::get('students');
            return $this->dataTable($data);
        }
        return view('student::students.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('divisions.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('student_name', function ($data) {
                return '<a href="' . route('students.show', $data->id) . '">' . $data->student_name . '</a>';
            })
            ->addColumn('division_grade', function ($data) {
                return $data->grade->grade_name . '[ ' . $data->division->division_name . ' ]';
            })
            ->addColumn('registration_name', function ($data) {
                return $data->regStatus->registration_name;
            })
            ->addColumn('more_btn', function ($data) {
                return $this->moreButtons($data);
            })
            ->addColumn('student_image', function ($data) {
                return '<a href="' . route('students.show', $data->id) . '">
                <img width="50" class="editable img-responsive sibling-image"
                    alt="Alex\'s Avatar" id="avatar2"
                    src="' . asset($data->student_image_path) . '" />
            </a>';
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'student_name', 'division_grade', 'more_btn', 'registration_name', 'student_image'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($father_id)
    {
        $student = new Student();
        $mothers = MotherOp::whereHas($father_id);
        $nationalities = NationalityOp::_fetchAll();
        $speaking_lang = LanguageOp::speak();
        $studding_lang = LanguageOp::study();
        $reg_status = RegistrationStatusOp::_fetchAll();
        $divisions = DivisionOp::_fetchAll();
        $grades = GradeOp::_fetchAll();
        $documents = AdmissionDocumentOp::_fetchAll();
        $steps = StepOp::_fetchAll();
        $schools = SchoolOp::_fetchAll();
        $guardians = GuardianOp::_fetchAll();
        return view('student::students.create',
            compact('student', 'mothers', 'nationalities', 'speaking_lang', 'studding_lang', 'reg_status', 'divisions',
                'grades', 'documents', 'steps', 'schools', 'guardians', 'father_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        // Ensure that the age fits the stage
        if (StudentOp::checkAgeForGrade() == 'older') {
            toastr()->error(trans('student::local.older_message'));
            return back()->withInput();
        }
        if (StudentOp::checkAgeForGrade() == 'smaller') {
            toastr()->error(trans('student::local.smaller_message'));
            return back()->withInput();
        }
        if (StudentOp::checkAgeForGrade() == 'invalid') {
            toastr()->error(trans('student::local.invalid_message'));
            return back()->withInput();
        }

        StudentOp::_store($request);

        // ADD REFRESH FATHERS IN REDIS
        Cache::flush();

        toastr()->success(trans('local.saved_success'));
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = StudentOp::_fetchById($id);
        return view('student::students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = StudentOp::_fetchById($id);
        return view('student::students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        StudentOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('students.index');
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
                $status = StudentOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }

    private function moreButtons($data)
    {
        return $data->student_type == trans('student::local.student') ? '
        <div class="btn-group mr-1 mb-1">
            <button type="button" class="btn btn-primary"> ' . trans('student::local.more') . '</button>
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="' . route('students.edit', $data->id) . '"><i class="la la-edit"></i> ' . trans('local.edit') . '</a>
                <div class="dropdown-divider"></div>
                <a target="_blank" class="dropdown-item" href="' . route('students.print', $data->id) . '"><i class="la la-print"></i> ' . trans('student::local.print') . '</a>
                <a target="_blank" class="dropdown-item" href="' . route('student-report.print', $data->id) . '"><i class="la la-print"></i> ' . trans('student::local.commissioner') . '</a>
                <a target="_blank" class="dropdown-item" href="' . route('students.proof-enrollment', $data->id) . '"><i class="la la-print"></i> ' . trans('student::local.add_proof_enrollments') . '</a>
            </div>
        </div>' : '
        <div class="btn-group mr-1 mb-1">
            <button type="button" class="btn btn-warning">' . trans('student::local.more') . '</button>
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="' . route('students.edit', $data->id) . '"><i class="la la-edit"></i> ' . trans('local.edit') . '</a>
                <a target="_blank" class="dropdown-item" href="' . route('students.print', $data->id) . '"><i class="la la-print"></i> ' . trans('student::local.print') . '</a>
                <a target="_blank" class="dropdown-item" href="#"><i class="la la-print"></i> ' . trans('student::local.print_statement_request') . '</a>
            </div>
        </div>';

    }
}
