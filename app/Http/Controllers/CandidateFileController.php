<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidateFile;
use App\Models\Candidate;

class CandidateFileController extends Controller
{
    public function upload(Request $request, $candidate_id)
    {
        $request->validate([
            'profile_photo' => 'required|file|mimes:png,jpeg,jpg|max:2048',
            'signature' => 'nullable|file|mimes:png,jpeg,jpg|max:2048',
            'id_proof' => 'nullable|file|mimes:png,jpeg,jpg|max:2048',
            'new_me' => 'nullable|file|mimes:png,jpeg,jpg|max:2048',
            'other_identification' => 'nullable|file|mimes:png,jpeg,jpg|max:2048',
            'other_identification2' => 'nullable|file|mimes:png,jpeg,jpg|max:2048',
            'other_identification3' => 'nullable|file|mimes:png,jpeg,jpg|max:2048',
            'other_identification4' => 'nullable|file|mimes:png,jpeg,jpg|max:2048',
        ]);

        $candidate = Candidate::findOrFail($candidate_id);

        $filePaths = [];
        foreach ([
            'profile_photo', 'signature', 'id_proof', 'new_me',
            'other_identification', 'other_identification2',
            'other_identification3', 'other_identification4'
        ] as $fileField) {
            if ($request->hasFile($fileField)) {
                $filePaths[$fileField] = $request->file($fileField)->store('reports', 'public');
            }
        }

        CandidateFile::updateOrCreate(
            ['candidate_id' => $candidate->id],
            $filePaths
        );

        return response()->json(['message' => 'Files uploaded successfully!'], 200);
    }

    public function getFiles($candidate_id)
    {
        $files = CandidateFile::where('candidate_id', $candidate_id)->firstOrFail();

        return response()->json([
            'profile_photo' => asset('storage/' . $files->profile_photo),
            'signature' => $files->signature ? asset('storage/' . $files->signature) : null,
            'id_proof' => $files->id_proof ? asset('storage/' . $files->id_proof) : null,
            'new_me' => $files->new_me ? asset('storage/' . $files->new_me) : null,
            'other_identification' => $files->other_identification ? asset('storage/' . $files->other_identification) : null,
            'other_identification2' => $files->other_identification2 ? asset('storage/' . $files->other_identification2) : null,
            'other_identification3' => $files->other_identification3 ? asset('storage/' . $files->other_identification3) : null,
            'other_identification4' => $files->other_identification4 ? asset('storage/' . $files->other_identification4) : null,
        ]);
    }
}
