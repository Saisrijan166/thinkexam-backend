<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Candidatefile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
        'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'id_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'new_me' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'other_identification' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'other_identification2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'other_identification3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'other_identification4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $filePaths = [];

    $fileFields = [
        'profile_photo', 'signature', 'id_proof', 'new_me',
        'other_identification', 'other_identification2',
        'other_identification3', 'other_identification4'
    ];

    foreach ($fileFields as $field) {
        if ($request->hasFile($field) && $request->file($field)->isValid()) {
            $filePaths[$field] = $request->file($field)->store('profile_photos', 'public');
        } else {
            $filePaths[$field] = null; 
        }
    }

    Candidatefile::create($filePaths);

    return response()->json([
        'message' => 'Files uploaded successfully!',
        'paths' => $filePaths
    ], 200);
}



public function count() {
    return response()->json(['count' => Candidate::count()]);
}


    
}
