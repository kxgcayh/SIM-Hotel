<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class LevelController extends Controller
{
    function __construct()
    {
        $this->middleware('verified');
    }
    
    public function index(Request $request)
    {
        $levels = Role::orderBy('id', 'DESC')->paginate(5);
        return view('admin.levels.index', compact('levels'))
            ->with('no', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $permission = Permission::get();
        return view('admin.levels.create', compact('permission'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:ms_levels,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.levels.index')
            ->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("tr_level_has_access", "tr_level_has_access.permission_id", "=", "ms_access.id")
            ->where("tr_level_has_access.role_id", $id)
            ->get();

        return view('admin.levels.show', compact('role', 'rolePermissions'));
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("tr_level_has_access")->where("tr_level_has_access.role_id", $id)
            ->pluck('tr_level_has_access.permission_id', 'tr_level_has_access.permission_id')
            ->all();

        return view('admin.levels.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.levels.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("ms_levels")->where('id', $id)->delete();
        return redirect()->route('admin.levels.index')
            ->with('success', 'Role deleted successfully');
    }
}
