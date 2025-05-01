<?php

namespace App\Http\Controllers;

use App\Services\TestsTableService;
use Illuminate\Http\Request;

class TestsTableController extends Controller
{
    protected $testsTableService;

    public function __construct(TestsTableService $testsTableService)
    {
        $this->testsTableService = $testsTableService;
    }

    /**
     * @OA\Get(
     *     path="/api/teststable",
     *     summary="Get all tests",
     *     tags={"Tests"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Number of results per page",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of tests"
     *     )
     * )
     */
    public function testTable(Request $request)
    {
        return response()->json($this->testsTableService->getAll($request->query('perPage', 15)));
    }

    /**
     * @OA\Get(
     *     path="/api/getFilteredTests",
     *     summary="Get filtered tests",
     *     tags={"Tests"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         description="Filter criteria",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Filtered tests"
     *     )
     * )
     */
    public function getFilteredTests(Request $request)
    {
        return response()->json($this->testsTableService->getFilteredTests($request->query('filter')));
    }

    /**
     * @OA\Get(
     *     path="/api/getcategorytests",
     *     summary="Get tests by category",
     *     tags={"Tests"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         description="Filter category",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of tests filtered by category"
     *     )
     * )
     */
    public function getCategoryTests(Request $request)
    {
        return response()->json($this->testsTableService->getCategoryTests($request->query('filter')));
    }

    /**
     * @OA\Delete(
     *     path="/api/delete/{id}",
     *     summary="Delete a test",
     *     tags={"Tests"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the test to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Test deleted successfully"
     *     )
     * )
     */
    public function delete($id)
    {
        $isDeleted = $this->testsTableService->delete($id);

        if ($isDeleted) {
            return response()->json([
                'success' => true,
                'data' => $this->testsTableService->getAll()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Record not deleted'
            ]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/edittest/{id}",
     *     summary="Edit a test",
     *     tags={"Tests"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the test to edit",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "start_date", "end_date", "status", "level"},
     *             @OA\Property(property="name", type="string", maxLength=255),
     *             @OA\Property(property="start_date", type="string", format="date"),
     *             @OA\Property(property="end_date", type="string", format="date"),
     *             @OA\Property(property="status", type="string", enum={"Active", "Inactive"}),
     *             @OA\Property(property="level", type="string", enum={"Beginner", "Intermediate", "Advanced"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Test updated successfully"
     *     )
     * )
     */
    public function editTest(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string|in:Active,Inactive',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'question' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'candidate' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'product' => 'required|string',
            'category' => 'required|string',
            'template' => 'required|string',
            'version' => 'required|string',
        ]);

        $updatedTest = $this->testsTableService->update($id, $validated);

        if ($updatedTest) {
            return response()->json(['success' => true, 'message' => 'Test updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Test not found.'], 404);
        }
    }

   /**
* @OA\Post(
 *     path="/api/addtest",
 *     summary="Add a new test",
 *     tags={"Tests"},
 *     security={{"sanctum":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "start_date", "end_date", "status", "question", "level", "candidate", "product", "category", "template", "version"},
 *             @OA\Property(property="name", type="string", example="Test 1"),
 *             @OA\Property(property="start_date", type="string", format="date", example="2025-01-01"),
 *             @OA\Property(property="end_date", type="string", format="date", example="2025-01-10"),
 *             @OA\Property(property="status", type="string", enum={"Active", "Inactive"}, example="Active"),
 *             @OA\Property(property="question", type="integer", example=50),
 *             @OA\Property(property="level", type="string", enum={"Beginner", "Intermediate", "Advanced"}, example="Beginner"),
 *             @OA\Property(property="candidate", type="integer", example=100),
 *             @OA\Property(property="product", type="string", example="Product A"),
 *             @OA\Property(property="category", type="string", example="Category 1"),
 *             @OA\Property(property="template", type="string", example="Template 1"),
 *             @OA\Property(property="version", type="string", example="v1.0")
 *         )
 *     ),
 *    @OA\Response(
 *         response=201,
 *         description="Test added successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Test added successfully."),
 *             @OA\Property(property="data", type="object", example={"id": 1, "name": "Math Assessment", "start_date": "2025-04-01", "end_date": "2025-04-15", "status": "Active", "level": "Intermediate", "question": "101", "candidate": "John Doe", "product": "CBT Software", "category": "Mathematics", "template": "Default Template", "version": "v1.0"})
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error occurred while adding test",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Error occurred while adding test: {error_message}")
 *         )
 *     )
 * )
 */

    public function addTest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string|in:Active,Inactive',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'question' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'candidate' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'product' => 'required|string',
            'category' => 'required|string',
            'template' => 'required|string',
            'version' => 'required|string',
        ]);

        try {
            $test = $this->testsTableService->create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Test added successfully.',
                'data' => $test,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error occurred while adding test: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/tests/count",
     *     summary="Get total test count",
     *     tags={"Dashboard"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Total number of tests"
     *     )
     * )
     */
    public function countTests()
    {
        return response()->json(['count' => $this->testsTableService->count()]);
    }

    /**
     * @OA\Get(
     *     path="/api/tests/active/count",
     *     summary="Get active test count",
     *     tags={"Dashboard"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Number of active tests"
     *     )
     * )
     */
    public function activeTestsCount()
    {
        return response()->json(['count' => $this->testsTableService->activeCount()]);
    }

    /**
     * @OA\Get(
     *     path="/api/tests/export",
     *     summary="Export test data",
     *     tags={"Tests"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Exported test data"
     *     )
     * )
     */
    public function exportTests()
    {
        $reports = $this->testsTableService->export();

        if ($reports->isEmpty()) {
            return response()->json(['message' => 'No data available'], 404);
        }

        return response()->json($reports);
    }

    /**
     * @OA\Get(
     *     path="/api/searchTests",
     *     summary="Search tests",
     *     tags={"Tests"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search query",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of matching tests"
     *     )
     * )
     */
    public function searchTests(Request $request)
    {
        return response()->json($this->testsTableService->search($request->query('search')));
    }
}
