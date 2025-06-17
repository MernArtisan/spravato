<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = service::all();
        return view('admin.service.index',[
            'services' => $services]);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {

            try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'type' => 'required|in:basic,premium,custom',
                'price' => 'required|numeric|min:0',
                'status' => 'required|in:active,hold,inactive',
                'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            ]);

            // Upload image
            $imagePath = null;
            if ($request->hasFile('image_path')) {
                $imagePath = $request->file('image_path')->store('services', 'public');
            }

             if ($request->hasFile('image_path')) {
                $image     = $request->file('image_path');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
          
                $image->move(public_path('uploads/services'), $imageName);
               
                $imagePath = 'uploads/services/' . $imageName;                                                                                                                                                                                                                                                                                                                                         
        
            }
     
            Service::create([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'price' => $request->price,
                'status' => $request->status,
                'is_active' => $request->is_active,
                'image_path' => $imagePath,
                'user_id' => auth()->user()->id,
            ]);

            return redirect()->back()->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create service: ' . $e->getMessage());
        }
    }

   public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:basic,premium,custom',
            'status' => 'required|in:active,hold,inactive',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image',
        ]);

        if ($request->hasFile('image_path')) {
   
            if ($service->image_path && file_exists(public_path($service->image_path))) {
                unlink(public_path($service->image_path));
            }

            $image = $request->file('image_path');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/services'), $imageName);
            $validated['image_path'] = 'uploads/services/' . $imageName;
        }

        $service->update($validated);

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    public function show($id)
    {
        return abort(404); // or redirect()->back();
    }



    // Delete service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete image file if exists
       $path = public_path($service->image_path); // e.g., 'upload/service/image.jpg'
        if (File::exists($path)) {
            File::delete($path);
        }
        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully!');
    }


    
}
