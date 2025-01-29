<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    //
    public function addcandidate(Request $request)
    {
        $validatedData = $request->validate([
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
    
        try {
            $candidate = Candidate::create($validatedData);
            return response()->json(['message' => 'Candidate details added successfully!', 'candidate_id' => $candidate->id], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
    






    
    // API to handle file uploads
    public function uploadcandidate(Request $request, $candidate_id)
    {
        $request->validate([
            'files.profile_photo' => 'nullable|file|mimes:png,jpeg,jpg',
            'files.signature' => 'nullable|file|mimes:png,jpeg,jpg',
            'files.id_proof' => 'nullable|file|mimes:png,jpeg,jpg',
            'files.new_me' => 'nullable|file|mimes:png,jpeg,jpg',
            'files.other_identification' => 'nullable|file|mimes:png,jpeg,jpg',
        ]);

        $candidate = Candidate::findOrFail($candidate_id);

        $filePaths = [];
        foreach (['profile_photo', 'signature', 'id_proof', 'new_me', 'other_identification'] as $fileField) {
            if ($request->hasFile("files.$fileField")) {
                $filePaths[$fileField] = $request->file("files.$fileField")->store('uploads', 'public');
            }
        }

        // Update candidate with file paths
        $candidate->update($filePaths);

        return response()->json(['message' => 'Candidate files uploaded successfully!'], 200);
    }

    
}
