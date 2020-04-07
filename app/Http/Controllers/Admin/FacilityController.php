<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomFacility as Facility;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacilityStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FacilityController extends Controller
{
    function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        $facilities = Facility::latest()->paginate(5);
        return view('admin.facilities.index', compact('facilities'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    public function store(FacilityStoreRequest $request)
    {
        $facilities = new Facility;
        $facilities->name = $request->name;
        $facilities->save();

        Alert::alert()->success('Succes', 'Data Facility Successfully Created');
        return redirect()->route('admin.facilities.index');
    }

    public function edit($slug)
    {
        $facility = Facility::where('slug', $slug)->firstOrFail();
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(FacilityStoreRequest $request, $slug)
    {
        $facilities = Facility::where('slug', $slug)->firstOrFail();
        $facilities->name = $request->name;
        $facilities->save();

        Alert::alert()->success('Succes', 'Data Facility Successfully Updated');
        return redirect()->route('admin.facilities.index');
    }

    public function destroy($slug)
    {
        $facility = Facility::where('slug', $slug)->firstOrFail();
        $facility->delete();

        Alert::toast('Data Facility Deleted Successfully', 'info');
        return redirect()->back();
    }
}
