<?php

namespace App\Http\Controllers;

use App\Models\Room;

use App\Models\Category;
use App\Models\RoomService;
use App\Models\Service;
use GuzzleHttp\Promise\Create;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    // CRUD ROOMS START
    public function index()
    {
        $categories = Category::all();
        $services = Service::all();
        $rooms = Room::paginate(7);

        return view('back-office.rooms.index', compact('categories', 'rooms', 'services'));
    }
    public function store(Request $request)
    {
        // Validate request data
        $data = $request->validate([
            'room_type' => 'required',
            'description' => 'required',
            'image' => 'required|image', // Ensure image is valid image file
            'type_accept' => 'required',
            'price' => 'required|numeric', // Validate price is a number
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        // Handle image upload
        $image = $request->file('image');
        if ($image) { // Check if image exists before processing
            $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $uniqueFileName);
            $data['image'] = $uniqueFileName;
        } else {
            // Handle case where no image is uploaded (e.g., set default image)
        }

        // Create room
        $room = Room::create($data);

        if ($room) {
            $roomServices = [];

            // Validate service IDs exist (optional)
            // You can check if service IDs exist in your database before creating entries
            foreach ($request->input('service_id') as $serviceId) {
                $roomServices[] = [
                    'service_id' => $serviceId,
                    'room_id' => $room->id, // Use the created room's ID
                ];
            }

            // Create multiple entries using the `insert()` method
            RoomService::insert($roomServices);
        } else {
            return back()->with('error', 'Room creation failed');
        }

        return back()->with('success', 'Room created successfully');
    }


    public function update(Request $request, $id)
    {
        // Validate request data
        $data = $request->validate([
            'room_type' => 'required',
            'description' => 'required',
            'image' => 'required',
            'type_accept' => 'required',
            'price' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
        // dd('cccc');

        // Retrieve the existing room record
        $room = Room::findOrFail($id);

        // Handle image upload if a new image is provided
        $image = $request->file('image');
        if ($image) {
            $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $uniqueFileName);
            $data['image'] = $uniqueFileName;

            // Delete the old image file
            if ($room->image) {
                $oldImagePath = public_path('assets/img') . '/' . $room->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }



        // Update the room record with the new data
        $room->update($data);

        if ($room) {
            // dd('hgd');
            // Update room services
            // Delete existing room services
            RoomService::where('room_id', $room->id)->delete();

            $roomServices = [];

            // Validate service IDs exist (optional)
            // You can check if service IDs exist in your database before creating entries
            foreach ($request->input('service_id') as $serviceId) {
                $roomServices[] = [
                    'service_id' => $serviceId,
                    'room_id' => $room->id,
                ];
            }

            // Create multiple entries using the `insert()` method
            RoomService::insert($roomServices);
        } else {
            return back()->with('error', 'Room update failed');
        }

        return back()->with('success', 'Room updated successfully');
    }
    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'room_type' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //         'type_accept' => 'required',
    //         'price' => 'required',
    //         'user_id' => 'required',
    //         'category_id' => 'required',
    //     ]);


    //     try {
    //         DB::beginTransaction();

    //         $service = Service::findOrFail($id);
    //         $service->fill($data);

    //         if ($request->hasFile('image')) {
    //             $image = $request->file('image');
    //             $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
    //             $image->move(public_path('assets/img'), $uniqueFileName);
    //             $service->image = $uniqueFileName;
    //         }

    //         $service->save();
    //         dd('jflkgh  ');
    //         // Update room services
    //         $roomServices = [];

    //         // Validate service IDs exist (optional)
    //         // You can check if service IDs exist in your database before creating entries
    //         foreach ($request->input('service_id') as $serviceId) {
    //             $roomServices[] = [
    //                 'service_id' => $serviceId,
    //                 'room_id' => $id, // Use the created room's ID
    //             ];
    //         }

    //         // Delete existing room services
    //         RoomService::where('room_id', $id)->delete();

    //         // Create multiple entries using the `insert()` method
    //         RoomService::insert($roomServices);

    //         DB::commit();

    //         return back()->with("success", 'Service updated successfully');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'Failed to update service');
    //     }
    // }

    public function destroy($id)
    {
        $romm = Room::find($id);
        if (!$romm) {
            return back()->with('error', 'Room deletion failed');
        }
        $romm->delete();
        return back()->with('seccess', 'Room deleted successfully');
    }
    // CRUD ROOMS ENDS HERE


    //  accept or  refuse  the room

    // Admin actions
    public function getRoomsForApproval()
    {
        $rooms = Room::where('is_accepted', 'refuse')->paginate(3);
        return view('back-office.rooms.roomsForApproval', compact('rooms'));
    }

    public function refuse($id)
    {
        // Perform the "refuse" action for a specific room by the admin
        $room = Room::find($id);
        $room->delete();
        return back()->with('success', 'Room delete form database');
    }

    public function accept($id)
    {
        // Perform the "accept" action for a specific room by the admin
        $room = Room::find($id);
        $room->is_accepted = 'accepte';
        $room->save();
        return back()->with('success', 'Room accepted');
    }
}
