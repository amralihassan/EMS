<?php

namespace Student\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Student\Http\Requests\DesignRequest;
use Student\Models\Settings\Design;
use Student\Models\Settings\Operations\DesignOp;
use Student\Models\Settings\Operations\DivisionOp;
use Student\Models\Settings\Operations\GradeOp;

class DesignController extends Controller
{
    public function index()
    {
        $grades = GradeOp::_fetchAll();
        $divisions = DivisionOp::_fetchAll();
        $designs = DesignOp::_fetchAll();
        return view('student::settings.id-cards-designs.index',
            compact('grades', 'divisions', 'designs'));
    }

    public function create()
    {
        $grades = GradeOp::_fetchAll();
        $divisions = DivisionOp::_fetchAll();
        $design = new Design();
        return view('student::settings.id-cards-designs.create',
            compact('grades', 'divisions', 'design'));
    }

    public function store(DesignRequest $request)
    {
        DesignOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('id-cards-designs.index');
    }

    public function filter()
    {
        $grades = GradeOp::_fetchAll();
        $divisions = DivisionOp::_fetchAll();

        $designs = DesignOp::_fetchByQuery();

        return view('student::settings.id-cards-designs.index',
            compact('grades', 'divisions', 'designs'));
    }

    public function edit($id)
    {
        $grades = GradeOp::_fetchAll();
        $divisions = DivisionOp::_fetchAll();
        $design = DesignOp::_fetchById($id);
        return view('student::settings.id-cards-designs.edit',
            compact('grades', 'divisions', 'design'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesignRequest $request, $id)
    {
        DesignOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('id-cards-designs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DesignOp::_destroy($id);
        toastr()->success(trans('local.delete_successfully'));
        return redirect()->route('id-cards-designs.index');
    }
}
