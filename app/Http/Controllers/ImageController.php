<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageEntry;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\File;


class ImageController extends Controller
{
    public function index()
    {
        $entries = ImageEntry::all();
        return view('index', compact('entries'));
    }

    public function addProperty()
    {
        $entries = ImageEntry::all();
        return view('add-property', compact('entries'));
    }

    public function store(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'image' => 'required|array',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'bedrooms' => 'required|string',
            'bathrooms' => 'required|string',
            'price' => 'required|string',
        ]);

        $destinationPath = public_path('uploads');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true);
        }

        $imagePaths = [];

        foreach ($request->file('image') as $file) {
            $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $imagePaths[] = '/uploads/' . $filename;
        }

        // Save all images as JSON array
        ImageEntry::create([
            'description' => $request->description,
            'image_path' => $imagePaths,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }




    public function update(Request $request, $id)
    {
        $entry = ImageEntry::findOrFail($id);
        $entry[$request->key] = $request->value;
        $entry->update();

        return response()->json(['message' => 'Description updated successfully']);
    }

    public function destroy($id)
    {
        $entry = ImageEntry::findOrFail($id);
        Storage::disk('public')->delete($entry->image_path);
        $entry->delete();

        return response()->json(['message' => 'Entry deleted successfully']);
    }

    public function propertyDetail(Request $request){
        $entry = ImageEntry::findOrFail($request->id);
        return view('property-detail', compact('entry'));
    }

    public function saveProfile(Request $request){
        Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'selected_date' => $request->selected_date,
            'selected_hour' => $request->selected_hour
        ]);
        return redirect()->back()->with('success', 'Profile saved successfully.');
    }
}
