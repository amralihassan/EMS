<?php
namespace Student\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cache;
use Student\Http\Requests\FatherRequest;
use Student\Http\Requests\MotherRequest;
use Student\Models\Parents\Operations\FatherOp;
use Student\Models\Parents\Operations\MotherOp;
use Student\Models\Settings\Operations\NationalityOp;

class ParentController extends Controller
{
    private $father;

    public function __construct()
    {
        // $this->middleware('permission:view-parents', ['only' => ['index']]);
        // $this->middleware('permission:add-parent', ['only' => ['create', 'store']]);
        // $this->middleware('permission:delete-parent', ['only' => ['destroy']]);

        // USE REDIS SERVER TO FETCH FATHERS DATA
        if (!Cache::has('fathers')) {
            $fathers = FatherOp::_fetchAll();
            Cache::remember('fathers', 3600, function () use ($fathers) {
                return $fathers;
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
            $data = Cache::get('fathers');
            return $this->dataTable($data);
        }
        return view('student::parents.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('fatherName', function ($data) {
                $nationality = $data->nationality_name;
                $father_name = $data->father_name;
                return '<a href="' . route('fathers.show', $data->id) . '">' . $father_name . '</a></br>' . $nationality;
            })
            ->addColumn('mobile', function ($data) {
                return $data->father_mobile1 . '</br>' . $data->father_mobile2;
            })
            ->addColumn('motherName', function ($data) {
                $mother_name = '';
                foreach ($data->mothers as $mother) {
                    $nationality = $mother->nationality_name;
                    $mother_name .= '<a class="a-hover" href="' . route('mothers.show', $mother->id) . '">' . $mother->full_name . '</a>
                [' . $nationality . ']</br>';
                }
                return $mother_name;
            })
            ->addColumn('mother_mobile', function ($data) {
                $mobile_number = '';
                foreach ($data->mothers as $mother) {
                    $mobile_number .= $mother->mother_mobile1 . '</br>';
                }
                return $mobile_number;
            })
            ->addColumn('check', function ($data) {
                $btnCheck = '<label class="pos-rel">
                            <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                            <span class="lbl"></span>
                        </label>';
                return $btnCheck;
            })
            ->rawColumns(['check', 'fatherName', 'motherName', 'mother_mobile', 'mobile'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities = NationalityOp::_fetchAll();
        return view('student::parents.create',
            compact('nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FatherRequest $fatherRequest, MotherRequest $motherRequest)
    {
        DB::transaction(function () use ($fatherRequest, $motherRequest) {
            $this->father = FatherOp::_store($fatherRequest);
            $mother = MotherOp::_store($motherRequest);
            FatherOp::fatherMotherRelation($this->father, $mother); // MANY TO MANY RELATIONSHIP

            // ADD REFRESH FATHERS IN REDIS
            Cache::flush();
        });
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('fathers.show', $this->father->id);
    }

    public function destroy()
    {
        if (request()->ajax()) {
            if (request()->has('id')) {
                $status = FatherOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }
}
