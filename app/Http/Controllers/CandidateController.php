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
            'files.profile_photo' => 'required|file|mimes:png,jpeg,jpg',
    
            // All other fields are nullable
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
            'files.signature' => 'nullable|file|mimes:png,jpeg,jpg',
            'files.id_proof' => 'nullable|file|mimes:png,jpeg,jpg',
            'files.new_me' => 'nullable|file|mimes:png,jpeg,jpg',
            'files.other_identification' => 'nullable|file|mimes:png,jpeg,jpg',
        ]);
        
    
        $filePaths = [];
        foreach (['profile_photo', 'signature', 'id_proof', 'new_me', 'other_identification'] as $fileField) {
            if ($request->hasFile("files.$fileField")) {
                $filePaths[$fileField] = $request->file("files.$fileField")->store('uploads', 'public');
            }
        }
    
        $candidateData = array_merge($validatedData, $filePaths);
    
        Candidate::create($candidateData);
    
        return response()->json(['message' => 'Candidate added successfully!'], 201);
    }
    
}
