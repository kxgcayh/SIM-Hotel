<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomType as Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        $hotels = Hotel::orderBy('name', 'ASC')->get();
        $types = Type::orderBy('name', 'ASC')->get();
        $rooms = Room::with('hotel', 'type')->latest()->paginate(10);
        return view('admin.rooms.index', compact('hotels', 'types', 'rooms'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    public function store(RoomStoreRequest $request)
    {
        $room = new Room;
        $room->hotel_id = $request->hotel_id;
        $room->room_type_id = $request->room_type_id;
        $room->name = $request->name;
        $room->price = $request->price;
        $room->save();

        Alert::success('Success', 'Data Room Created Succssfully.');
        return redirect()->route('admin.rooms.index');
    }

    public function edit($slug)
    {
        $hotels = Hotel::orderBy('name', 'ASC')->get();
        $types = Type::orderBy('name', 'ASC')->get();
        $room = Room::with('hotel', 'type')->where('slug', $slug)->firstOrFail();
        return view('admin.rooms.edit', compact('hotels', 'types', 'room'));
    }

    public function update(RoomStoreRequest $request, $slug)
    {
        $room = Room::where('slug', $slug)->firstOrFail();
        $room->hotel_id = $request->hotel_id;
        $room->room_type_id = $request->room_type_id;
        $room->name = $request->name;
        $room->price = $request->price;
        $room->save();

        Alert::success('Success', 'Data Room Updated Succssfully.');
        return redirect()->route('admin.rooms.index');
    }

    public function destroy($slug)
    {
        $room = Room::where('slug', $slug)->firstOrFail();
        $room->delete();

        Alert::toast('Data Room Deleted Successfully', 'info');
        return redirect()->route('admin.rooms.index');
    }
}
