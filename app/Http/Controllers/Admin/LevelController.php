<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
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
    {
      $level = Level::find($id);
       $rolePermissions = Access::join("tr_level_has_access", "tr_level_has_access.permissio_id", "=", "ms_access.id")
           ->where("tr_level_has_access.role_id", $id)
           ->get();


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
>>>>>>> before discard
