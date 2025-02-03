<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Candidatefile;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    //
    public function addcandidate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:candidates,email',
        'password' => 'required|min:6',
        'name' => 'nullable|string|max:255',
        'enrollment' => 'nullable|string|max:255',
        'date_of_registration' => 'nullable|date',
        'phone' => 'nullable|string|max:15',
        'dob' => 'nullable|date',
        'gender' => 'nullable|in:male,female',
        'school_name' => 'nullable|string|max:255',
        'year' => 'nullable|integer',
        'session' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'country' => 'nullable|string',
        'state' => 'nullable|string',
        'city' => 'nullable|string',
        'pincode' => 'nullable|string|max:10',
        'group' => 'nullable|string',
        'other_selection' => 'nullable|string',
        'status' => 'nullable|in:active,inactive',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed!',
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        $candidate = Candidate::create($validator->validated());
        return response()->json(['message' => 'Candidate details added successfully!', 'candidate_id' => $candidate->id], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
    }
}

    

public function uploadFiles(Request $request)
{
    $validated = $request->validate([
        'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('profile_photo') && $request->file('profile_photo')->isValid()) {
        $file = $request->file('profile_photo');
        $path = $file->store('profile_photos', 'public');  // Store in storage/app/public/profile_photos

        // Do the same for other files as needed...

        // Store path in database or return response
        return response()->json(['message' => 'Files uploaded successfully!', 'path' => $path], 200);
    }

    return response()->json(['message' => 'No file uploaded or file is invalid.'], 400);
}


public function count() {
    return response()->json(['count' => Candidate::count()]);
}


    
}
