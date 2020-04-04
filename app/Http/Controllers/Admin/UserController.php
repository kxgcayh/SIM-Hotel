<?php


namespace App\Http\Controllers\Admin;

use DB;
use Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('verified');
    }


    public function index()
    {
        $data = User::orderBy('id_user', 'DESC')->paginate(5);
        return view('admin.users.index', compact('data'))
            ->with('no', (request()->input('page', 1) - 1)* 5);
    }


    public function create()
    {
        $levels = Role::orderBy('name', 'ASC')->get();
        return view('admin.users.create', compact('levels'));
    }


    public function store(UserStoreRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully');
    }


    public function show($id_user)
    {
        $user = User::find($id_user);
        return view('admin.users.show', compact('user'));
    }


    public function edit($id_user)
    {
        $user = User::find($id_user);
        $roles= Role::orderBy('name', 'ASC')->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(UserUpdateRequest $request, $id_user)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $user = User::find($id_user);
        $user->update($input);
        DB::table('tr_user_has_levels')->where('model_id', $id_user)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }


    public function destroy($id_user)
    {
        User::find($id_user)->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}
