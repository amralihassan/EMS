<?php

namespace Student\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use DB;
use Student\Http\Requests\FatherRequest;
use Student\Http\Requests\MotherRequest;
use Student\Models\Parents\Mother;
use Student\Models\Parents\Operations\FatherOp;
use Student\Models\Parents\Operations\MotherOp;
use Student\Models\Settings\Operations\NationalityOp;

class FatherController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-father', ['only' => ['show']]);
        // $this->middleware('permission:edit-father', ['only' => ['edit', 'update']]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $father = FatherOp::_fetchById($id);
        return view('student::parents.fathers.show', compact('father'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationalities = NationalityOp::_fetchAll();
        $father = FatherOp::_fetchById($id);
        return view('student::parents.fathers.edit', compact('father', 'nationalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FatherRequest $request, $id)
    {
        FatherOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('fathers.show', $id);
    }

    public function createMother($id)
    {
        $nationalities = NationalityOp::_fetchAll();
        $father_name = FatherOp::getFatherName($id);
        $mother = new Mother();
        return view('student::parents.fathers.add-wife', compact('id', 'father_name', 'nationalities', 'mother'));

    }

    public function storeMother(MotherRequest $request)
    {
        DB::transaction(function () use ($request) {
            $father = FatherOp::_fetchById($request->father_id);
            $mother = MotherOp::_store($request);
            FatherOp::fatherMotherRelation($father, $mother); // MANY TO MANY RELATIONSHIP
        });
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('fathers.show', $request->father_id);
    }
}
