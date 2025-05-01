<?php

namespace App\Http\Controllers;

use App\Services\EventTableService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventTableService;

    public function __construct(EventTableService $eventTableService)
    {
        $this->eventTableService = $eventTableService;
    }

    /**
     * @OA\Get(
     *     path="/api/eventtable",
     *     summary="Get paginated event table",
     *     tags={"CBT"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Number of records per page",
     *         required=false,
     *         @OA\Schema(type="integer", default=15)
     *     ),
     *     @OA\Response(response=200, description="Successful response"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function eventtable(Request $request)
    {
        $perPage = $request->query('perPage', 15);
        return response()->json($this->eventTableService->getAll($perPage));
    }

    /**
     * @OA\Get(
     *     path="/api/getevents",
     *     summary="Get filtered events",
     *     tags={"CBT"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         description="Filter criteria",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful response"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function getFilteredEvents(Request $request)
    {
        $filter = $request->query('filter');
        $result = $this->eventTableService->getFilteredEvents($filter);

        if (isset($result['error'])) {
            return response()->json(['success' => false, 'message' => $result['error']], 500);
        }

        return response()->json(['success' => true, 'data' => $result]);
    }

    /**
     * @OA\Delete(
     *     path="/api/deleteevent/{id}",
     *     summary="Delete an event",
     *     tags={"CBT"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Event ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Event deleted successfully"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function deleteevent($id)
    {
        $result = $this->eventTableService->delete($id);

        if (isset($result['error'])) {
            return response()->json(['success' => false, 'message' => $result['error']], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $this->eventTableService->getAll()
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/editevent/{id}",
     *     summary="Edit an event",
     *     tags={"CBT"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Event ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"event_name", "event_code", "exam_event_type", "event_type", "event_opening", "event_closing", "event_date"},
     *             @OA\Property(property="event_name", type="string"),
     *             @OA\Property(property="event_code", type="string"),
     *             @OA\Property(property="exam_event_type", type="string"),
     *             @OA\Property(property="event_type", type="string"),
     *             @OA\Property(property="event_opening", type="string", format="date"),
     *             @OA\Property(property="event_closing", type="string", format="date"),
     *             @OA\Property(property="event_date", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Event updated successfully"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function editevent(Request $request, $id)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_code' => 'required|string|max:255',
            'exam_event_type' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'event_opening' => 'required|date',
            'event_closing' => 'required|date|after_or_equal:event_opening',
            'event_date' => 'required|date',

        ]);

        $result = $this->eventTableService->update($id, $validated);

        if (isset($result['error'])) {
            return response()->json(['success' => false, 'message' => $result['error']], 500);
        }

        return response()->json(['success' => true, 'message' => 'Event updated successfully.', 'data' => $result['data']]);
    }

    /**
     * @OA\Post(
     *     path="/api/addevent",
     *     summary="Add a new event",
     *     tags={"CBT"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"event_name", "event_code", "exam_event_type", "event_type", "event_opening", "event_closing", "event_date"},
     *             @OA\Property(property="event_name", type="string"),
     *             @OA\Property(property="event_code", type="string"),
     *             @OA\Property(property="exam_event_type", type="string", enum={"Online", "Offline"}),
     *             @OA\Property(property="event_type", type="string", enum={"Competition", "Exhibition", "Event", "Conference"}),
     *             @OA\Property(property="event_opening", type="string", format="date"),
     *             @OA\Property(property="event_closing", type="string", format="date"),
     *             @OA\Property(property="event_date", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Event added successfully"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function addevent(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_code' => 'required|string|max:255',
            'exam_event_type' => 'required|string|in:Online,Offline',
            'event_type' => 'required|string|in:Competition,Exhibition,Event,Conference',
            'event_opening' => 'required|date',
            'event_closing' => 'required|date',
            'event_date' => 'required|date',
        ]);

        $result = $this->eventTableService->create($validated);

        if (isset($result['error'])) {
            return response()->json(['success' => false, 'message' => $result['error']], 500);
        }

        return response()->json(['success' => true, 'message' => 'Event added successfully.', 'data' => $result], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/searchEvents",
     *     summary="Search for events",
     *     tags={"CBT"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search term for event names or codes",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Search results returned successfully"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function searchEvents(Request $request)
    {
        $search = $request->query('search');
        $result = $this->eventTableService->search($search);

        if (isset($result['error'])) {
            return response()->json(['success' => false, 'message' => $result['error']], 500);
        }

        return response()->json(['success' => true, 'data' => $result]);
    }
}
