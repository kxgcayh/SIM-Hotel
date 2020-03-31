<?php

namespace App\Http\Controllers\Admin;
use App\Models\Hotel;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HotelController extends Controller
{

  function __construct()
  {
      $this->middleware('verified');
  }


    public function index()
    {
      $city = City::orderBy('name', 'ASC')->get();
      $hotels = Hotel::with('city')->latest()->paginate(5);
      return view('admin.hotels.index', compact('hotels', 'city'))
          ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'city_id' => 'required', 'exists:ms_provinces,slug',
          'name' => 'required', 'min:6',
      ], [
          'city_id.required' => 'Province is Required',
          'name.required' => 'City Name is Required'
      ]);

      $hotels = new Hotel;
      $hotels->city_id = $request->city_id;
      $hotels->name = $request->name;
      $hotels->save();

      Alert::alert()->success('Succes', 'Data City Successfully Created');
      return redirect()->route('admin.hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $city = City::orderBy('name', 'ASC')->get();
      $hotels = Hotel::with('city')->where('slug', $slug)->firstOrFail();
      return view('admin.hotels.edit', compact('hotels', 'city'));
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
      $request->validate([
          'city_id' => 'required', 'exists:ms_provinces,slug',
          'name' => 'required',
      ], [
          'city_id.required' => 'Province is Required',
          'name.required' => 'Province name is required'
      ]);

      $hotels = Hotel::where('slug', $slug)->firstOrFail();
      $hotels->city_id = $request->city_id;
      $hotels->name = $request->name;
      $hotels->save();

      Alert::info('Update Data Success', 'Data City Updated Succssfully.');
      return redirect()->route('admin.hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hotels = Hotel::where('slug', $slug)->firstOrFail();
      $hotels->delete();

      Alert::toast('Data Province Deleted Successfully', 'info');
      return redirect()->route('admin.hotels.index');
    }
}
