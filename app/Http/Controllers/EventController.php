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

    public function eventtable(Request $request)
    {
        $perPage = $request->query('perPage', 15);
        return response()->json($this->eventTableService->getAll($perPage));
    }


    public function getFilteredEvents(Request $request)
    {
        $filter = $request->query('filter');
        $result = $this->eventTableService->getFilteredEvents($filter);

        if (isset($result['error'])) {
            return response()->json(['success' => false, 'message' => $result['error']], 500);
        }

        return response()->json(['success' => true, 'data' => $result]);
    }

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
}
