<?php

namespace App\Http\Controllers;

use App\Models\Room;

use App\Models\Category;
use App\Models\Service;
use GuzzleHttp\Promise\Create;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $rooms = Room::paginate(7);
        return view('back-office.rooms.index', compact('categories', 'rooms'));
    }
    public function store(Request $request)

    {
        $data = $request->validate([
            'room_type' => 'required',
            'description' => 'required',
            'image' => 'required',
            'type_accept' => 'required',
            'price' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        // Handle image upload
        $image = $request->file('image');
        $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/img'), $uniqueFileName);

        // Append the image file name to the assets/img/ directory
        $data['image'] = $uniqueFileName;

        // Create room
        $room = Room::create($data);

        // Check if room creation failed
        if (!$room) {
            return back()->with('error', 'Room creation failed');
        }

        return back()->with('success', 'Room created successfully');
    }
    public  function update(Request $request, $id)
    {
        $data = $request->validate([
            'room_type' => 'required',
            'description' => 'required',
            'image' => 'required',
            'type_accept' => 'required',
            'price' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
        try {

            DB::beginTransaction();

            $service = Service::findOrFail($id);
            $service->fill($data);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/img'), $uniqueFileName);
                $service->image = $uniqueFileName;
            }

            $service->save();

            DB::commit();

            return back()->with("success", 'Service updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to update service');
        }
    }


    public function destroy($id)
    {
        $romm = Room::find($id);
        if (!$romm) {
            return back()->with('error', 'Room deletion failed');
        }
        $romm->delete();
        return back()->with('seccess', 'Room deleted successfully');
    }
}
