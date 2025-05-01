<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Candidatefile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CandidateController extends Controller
{
    protected $candidate;
    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * @OA\Post(
     *     path="/api/addcandidate",
     *     summary="Add a new candidate",
     *     security={{"sanctum":{}}},
     *     tags={"Candidates"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", format="email", example="candidate@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="securepassword"),
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="phone", type="string", example="9876543210")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Candidate details added successfully"),
     *     @OA\Response(response=422, description="Validation failed"),
     *     @OA\Response(response=500, description="Something went wrong")
     * )
     */

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
            $candidate = $this->candidate->create($validator->validated());
            return response()->json(['message' => 'Candidate details added successfully!', 'candidate_id' => $candidate->id], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/candidate/upload-files",
     *     summary="Upload candidate files",
     *     tags={"Candidates"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"profile_photo"},
     *                 @OA\Property(property="profile_photo", type="string", format="binary"),
     *                 @OA\Property(property="signature", type="string", format="binary"),
     *                 @OA\Property(property="id_proof", type="string", format="binary"),
     *                 @OA\Property(property="new_me", type ="string", format="binary"),
     *                 @OA\Property(property="other_identification", type="string", format="binary"),
     *                 @OA\Property(property="other_identification2", type="string", format="binary"),
     *                 @OA\Property(property="other_identification3", type="string", format="binary"),
     *                 @OA\Property(property="other_identification4", type="string", format="binary")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=200, description="Files uploaded successfully"),
     *     @OA\Response(response=422, description="Validation failed"),
     *     @OA\Response(response=500, description="Something went wrong")
     * )
     */
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
            'profile_photo',
            'signature',
            'id_proof',
            'new_me',
            'other_identification',
            'other_identification2',
            'other_identification3',
            'other_identification4'
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

    /**
     * @OA\Get(
     *     path="/api/candidates/count",
     *     summary="Get total number of candidates",
     *     security={{"sanctum":{}}},
     *     tags={"Dashboard"},
     *     @OA\Response(
     *         response=200,
     *         description="Total number of candidates",
     *         @OA\JsonContent(
     *             @OA\Property(property="count", type="integer", example=100)
     *         )
     *     )
     * )
     */

    public function count()
    {
        return response()->json(['count' => $this->candidate->count()]);
    }
}
