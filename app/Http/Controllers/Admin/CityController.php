<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        $provinces = Province::orderBy('name', 'ASC')->get();
        $cities = City::with('province')->latest()->paginate(5);
        return view('admin.cities.index', compact('cities', 'provinces'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required', 'exists:ms_provinces,slug',
            'name' => 'required', 'min:6',
        ], [
            'province_id.required' => 'Province is Required',
            'name.required' => 'City Name is Required'
        ]);

        $city = new City;
        $city->province_id = $request->province_id;
        $city->name = $request->name;
        $city->save();

        Alert::alert()->success('Succes', 'Data City Successfully Created');
        return redirect()->route('admin.cities.index');
    }

    public function edit($slug)
    {
        $provinces = Province::orderBy('name', 'ASC')->get();
        $city = City::with('province')->where('slug', $slug)->firstOrFail();
        return view('admin.cities.edit', compact('city', 'provinces'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'province_id' => 'required', 'exists:ms_provinces,slug',
            'name' => 'required',
        ], [
            'province_id.required' => 'Province is Required',
            'name.required' => 'Province name is required'
        ]);

        $city = City::where('slug', $slug)->firstOrFail();
        $city->province_id = $request->province_id;
        $city->name = $request->name;
        $city->save();

        Alert::info('Update Data Success', 'Data City Updated Succssfully.');
        return redirect()->route('admin.cities.index');
    }

    public function destroy($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        $city->delete();

        Alert::toast('Data Province Deleted Successfully', 'info');
        return redirect()->route('admin.cities.index');
    }
}
