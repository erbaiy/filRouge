<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(4);

        return view('back-office.service.index', compact('services'));
    }
    // public function store(Request $request)
    // {
    //     $data = $request->validate([

    //         'name' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //         'price' => 'required',
    //     ]);

    //     $image = $request->file('image');
    //     if ($image) { // Check if image exists before processing
    //         $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
    //         $image->move(public_path('assets/img'), $uniqueFileName);
    //         $data['image'] = $uniqueFileName;
    //     } else {
    //         // Handle case where no image is uploaded (e.g., set default image)
    //     }
    //     if (!$data) {

    //         return back()->with('error', 'invalide data');
    //     }
    //     $service = Service::create($data);

    //     return back()->with("seccess", 'service created with seccess');
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'price' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $uniqueFileName);
            $data['image'] = $uniqueFileName;
        } else {
            // Handle case where no image is uploaded (e.g., set default image)
            $data['image'] = 'default.jpg'; // Replace 'default.jpg' with your default image filename
        }

        $service = Service::create($data);

        return back()->with("success", 'Service created successfully.');
    }
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete($id);
        return back()->with('success', 'service destroyed');
    }
    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //         'price' => 'required'
    //     ]);

    //     // Handle image upload
    //     $image = $request->image;
    //     // dd($image);  
    //     $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
    //     $image->move(public_path('assets/img'), $uniqueFileName);

    //     $service = Service::findOrFail($id);
    //     $service->name = $data['name'];
    //     $service->description = $data['description'];
    //     $service->image = $uniqueFileName;
    //     $service->price = $data['price'];
    //     $service->save();

    //     return back()->with("success", 'Service updated successfully');
    // }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required'
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
}
