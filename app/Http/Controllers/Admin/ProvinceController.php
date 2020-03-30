<?php

namespace App\Http\Controllers\Admin;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProvinceController extends Controller
{    
    function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        $provinces = Province::latest()->paginate(5);
        return view('admin.provinces.index', compact('provinces'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }    
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'min:6',
        ], [
            'name.required' => 'Province name is required'
        ]);

        $provinces = new Province;
        $provinces->name = $request->name;
        $provinces->save();

        Alert::alert()->success('Succes', 'Province Data Successfully Created');
        return redirect()->route('admin.provinces.index');
    }    
    
    public function edit(Province $province)
    {
        return view('admin.provinces.edit', compact('province'));
    }
    
    public function update(Request $request, Province $province)
    {
        $request->validate([
            'name' => 'required',            
        ], [
            'name.required' => 'Province name is required'
        ]);

        $province->update($request->all());

        Alert::info('Update Data Success', 'Data Province Updated Succssfully.');
        return redirect()->route('admin.provinces.index');
    }
    
    public function destroy($id_province)
    {
        $province = Province::findOrFail($id_province);
        $province->delete();

        Alert::toast('Data Province Deleted Successfully', 'info');
        return redirect()->route('admin.provinces.index');
    }
}
