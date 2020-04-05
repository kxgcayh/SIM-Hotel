<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use App\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;

class HotelController extends Controller
{

    function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
      $cities = City::orderBy('name', 'ASC')->get();
      $hotels = Hotel::with('city')->latest()->paginate(5);
      return view('admin.hotels.index', compact('hotels', 'cities'))
          ->with('no', (request()->input('page', 1) - 1) *5);
    }

    public function store(HotelStoreRequest $request)
    {
      $hotels = new Hotel;
      $hotels->city_id = $request->city_id;
      $hotels->name = $request->name;
      $hotels->address = $request->address;
      $hotels->save();

      Alert::alert()->success('Succes', 'Data City Successfully Created');
      return redirect()->route('admin.hotels.index');
    }

    public function edit($slug)
    {
      $cities = City::orderBy('name', 'ASC')->get();
      $hotel = Hotel::with('city')->where('slug', $slug)->firstOrFail();
      return view('admin.hotels.edit', compact('hotel', 'cities'));
    }

    public function update(HotelStoreRequest $request, $slug)
    {
      $hotels = Hotel::where('slug', $slug)->firstOrFail();
      $hotels->city_id = $request->city_id;
      $hotels->name = $request->name;
      $hotels->address = $request->address;
      $hotels->save();

      Alert::info('Update Data Success', 'Data City Updated Succssfully.');
      return redirect()->route('admin.hotels.index');
    }

    public function destroy($slug)
    {
      $hotels = Hotel::where('slug', $slug)->firstOrFail();
      $hotels->delete();

      Alert::toast('Data Province Deleted Successfully', 'info');
      return redirect()->route('admin.hotels.index');
    }
}
