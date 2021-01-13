<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Operations\AdminOp;
use App\Models\Operations\PermissionOp;
use App\Models\Operations\RoleOp;
use App\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-roles', ['only' => ['index', 'show']]);
        $this->middleware('permission:add-roles', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-roles', ['only' => ['edit', 'update', 'addPermission']]);
        $this->middleware('permission:delete-roles', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = RoleOp::_fetchAll();
            return $this->dataTable($data);
        }
        return view('admin.roles.index');
    }

    private function dataTable($data)
    {
        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-warning btn-sm" href="' . route('roles.edit', $data->id) . '">
                        <i class="la la-edit"></i>
                    </a>';
            })
            ->addColumn('show', function ($data) {
                return '<a class="btn btn-info btn-sm" href="' . route('roles.show', $data->id) . '">
                        <i class="la la-eye"></i>
                    </a>';
            })
            ->addColumn('check', function ($data) {
                return '<label class="pos-rel">
                                <input type="checkbox" class="ace" name="id[]" value="' . $data->id . '" />
                                <span class="lbl"></span>
                            </label>';
            })
            ->rawColumns(['action', 'check', 'show'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        return view('admin.roles.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = RoleOp::_store($request);
        toastr()->success(trans('local.saved_success'));
        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = RoleOp::_fetchById($id);
        $admins = AdminOp::_fetchAll();
        return view('admin.roles.show', compact('role', 'admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = RoleOp::_fetchById($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        RoleOp::_update($request, $id);
        toastr()->success(trans('local.updated_success'));
        return redirect()->route('roles.index');
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
                $status = RoleOp::_destroy(request('id'));
            }
        }
        return response(['status' => $status]);
    }

    public function addPermission()
    {
        PermissionOp::addPermissions(request()->all());
        toastr()->success(trans('local.updated_success'));
        return redirect()->back();
    }
}
