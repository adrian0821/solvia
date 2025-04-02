<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageEntry;
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255'
        ]);

        // Generate a unique filename
        $filename = time() . '_' . $request->file('image')->getClientOriginalName();

        // Define the path for saving the image directly into the public/uploads folder
        $destinationPath = public_path('uploads'); // public/uploads directory

        // Ensure the 'uploads' directory exists
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true); // Create directory if it doesn't exist
        }

        // Move the uploaded file to the public/uploads directory
        $request->file('image')->move($destinationPath, $filename);

        // Create an entry in the ImageEntry model
        ImageEntry::create([
            'description' => $request->description,
            'image_path' => '/uploads/' . $filename // Path is relative to the public directory
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }



    public function update(Request $request, $id)
    {
        $entry = ImageEntry::findOrFail($id);
        $entry->update(['description' => $request->description]);

        return response()->json(['message' => 'Description updated successfully']);
    }

    public function destroy($id)
    {
        $entry = ImageEntry::findOrFail($id);
        Storage::disk('public')->delete($entry->image_path);
        $entry->delete();

        return response()->json(['message' => 'Entry deleted successfully']);
    }
}
