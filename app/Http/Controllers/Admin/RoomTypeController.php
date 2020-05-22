<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomType as Type;
use App\Models\RoomFacility as Facility;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\RoomTypeStoreRequest;

class RoomTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        $facilities = Facility::orderBy('name', 'ASC')->get();
        $types = Type::orderBy('name')->paginate(5);
        return view('admin.roomtypes.index', compact('facilities', 'types'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }


    public function store(RoomTypeStoreRequest $request)
    {
        $type = new Type;
        $type->facility_id = $request->facility_id;
        $type->name = $request->name;
        $type->save();

        Alert::success('Success', 'Data City Created Succssfully.');
        return redirect()->route('admin.roomtypes.index');
    }

    public function edit($slug)
    {
        $facility = Facility::orderBy('name', 'ASC')->get();
        $type = Type::where('slug', $slug)->firstOrFail();
        return view('admin.roomtypes.edit', compact('facility', 'type'));
    }

    public function update(RoomTypeStoreRequest $request, $slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        $type->facility_id = $request->facility_id;
        $type->name = $request->name;
        $type->save();

        Alert::success('Success', 'Data City Updated Succssfully.');
        return redirect()->route('admin.roomtypes.index');
    }

    public function destroy($slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        $type->delete();

        Alert::toast('Data Room Type Deleted Successfully', 'info');
        return redirect()->route('admin.roomtypes.index');
    }
}
