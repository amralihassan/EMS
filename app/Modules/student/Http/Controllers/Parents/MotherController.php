<?php

namespace Student\Http\Controllers\Parents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Student\Models\Parents\Operations\MotherOp;
use Student\Models\Settings\Operations\NationalityOp;

class MotherController extends Controller
{

    public function __construct()
    {
        // $this->middleware('permission:view-mother', ['only' => ['show']]);
        // $this->middleware('permission:edit-mother', ['only' => ['edit', 'update']]);
    }

    public function show($id)
    {
        $mother = MotherOp::_fetchById($id);
        return view('student::parents.mothers.show', compact('mother'));
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
        $mother = MotherOp::_fetchById($id);
        return view('student::parents.mothers.edit', compact('mother', 'nationalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
