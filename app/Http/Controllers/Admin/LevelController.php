<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class LevelController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      
    }

     function __construct()
 {
     $this->middleware('verified');
     $this->middleware('permission:Manage Roles', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'index']]);
 }

 /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

 public function index(Request $request)
   {
       $level = Level::orderBy('id', 'DESC')->paginate(5);
       return view('levels.index', compact('level'))
           ->with('no', ($request->input('page', 1) - 1) * 5);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $access = Accsess::get();
       return view('level.create', compact('access'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
           'name' => 'required|unique:ms_level,name',
           'access' => 'required',
       ]);

       $level = Level::create(['name' => $request->input('name')]);
       $level->syncPermissions($request->input('access'));

       return redirect()->route('levels.index')
           ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

       return view('levels.show', compact('level', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Level = Level::find($id);
$permission = Access::get();
$rolePermissions = DB::table("tr_level_has_access")->where("tr_level_has_access.role_id", $id)
    ->pluck('tr_level_has_access.permission_id', 'tr_level_has_access.permission_id')
    ->all();

return view('levels.edit', compact('level', 'permission', 'rolePermissions'));
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
      $this->validate($request, [
                'name' => 'required',
                'Access' => 'required',
            ]);

            $role = level::find($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('Access'));

            return redirect()->route('levels.index')
                ->with('success', 'Levels updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      DB::table("ms_levels")->where('id', $id)->delete();
      return redirect()->route('levels.index')
          ->with('success', 'Role deleted successfully');
    }
}
=======
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Level;
use Spatie\Permission\Models\Access;
use DB;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct()
 {
     $this->middleware('verified');
     $this->middleware('permission:Manage Roles', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'index']]);
 }
 public function index(Request $request)
   {
       $level = Level::orderBy('id', 'DESC')->paginate(5);
       return view('levels.index', compact('level'))
           ->with('no', ($request->input('page', 1) - 1) * 5);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $access = Accsess::get();
       return view('level.create', compact('access'));
=======
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
>>>>>>> 1ffc05096c2d968576f9047d575116c1cafcf166
    }
    
    public function store(Request $request)
    {
<<<<<<< HEAD
      $this->validate($request, [
           'name' => 'required|unique:ms_level,name',
           'access' => 'required',
       ]);

       $level = Level::create(['name' => $request->input('name')]);
       $level->syncPermissions($request->input('access'));

       return redirect()->route('levels.index')
           ->with('success', 'Role created successfully');
=======
        $this->validate($request, [
            'name' => 'required|unique:ms_levels,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.levels.index')
            ->with('success', 'Role created successfully');
>>>>>>> 1ffc05096c2d968576f9047d575116c1cafcf166
    }

    public function show($id)
    {
<<<<<<< HEAD
      $level = Level::find($id);
       $rolePermissions = Access::join("tr_level_has_access", "tr_level_has_access.permissio_id", "=", "ms_access.id")
           ->where("tr_level_has_access.role_id", $id)
           ->get();


       return view('levels.show', compact('level', 'rolePermissions'));
=======
        $role = Role::find($id);
        $rolePermissions = Permission::join("tr_level_has_access", "tr_level_has_access.permission_id", "=", "ms_access.id")
            ->where("tr_level_has_access.role_id", $id)
            ->get();

        return view('admin.levels.show', compact('role', 'rolePermissions'));
>>>>>>> 1ffc05096c2d968576f9047d575116c1cafcf166
    }


    public function edit($id)
    {
<<<<<<< HEAD
      $Level = Level::find($id);
$permission = Access::get();
$rolePermissions = DB::table("tr_level_has_access")->where("tr_level_has_access.role_id", $id)
    ->pluck('tr_level_has_access.permission_id', 'tr_level_has_access.permission_id')
    ->all();

return view('levels.edit', compact('level', 'permission', 'rolePermissions'));
=======
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("tr_level_has_access")->where("tr_level_has_access.role_id", $id)
            ->pluck('tr_level_has_access.permission_id', 'tr_level_has_access.permission_id')
            ->all();

        return view('admin.levels.edit', compact('role', 'permission', 'rolePermissions'));
>>>>>>> 1ffc05096c2d968576f9047d575116c1cafcf166
    }

    public function update(Request $request, $id)
    {
<<<<<<< HEAD
      $this->validate($request, [
                'name' => 'required',
                'Access' => 'required',
            ]);

            $role = level::find($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('Access'));

            return redirect()->route('levels.index')
                ->with('success', 'Levels updated successfully');
=======
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
>>>>>>> 1ffc05096c2d968576f9047d575116c1cafcf166
    }

    public function destroy($id)
    {
<<<<<<< HEAD

      DB::table("ms_levels")->where('id', $id)->delete();
      return redirect()->route('levels.index')
          ->with('success', 'Role deleted successfully');
=======
        DB::table("ms_levels")->where('id', $id)->delete();
        return redirect()->route('admin.levels.index')
            ->with('success', 'Role deleted successfully');
>>>>>>> 1ffc05096c2d968576f9047d575116c1cafcf166
    }
}
>>>>>>> before discard
