<?php

namespace App\Http\Controllers;

use App\Models\eventtable;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventTable;
    public function __construct(eventtable $eventTable)
    {
        $this->eventTable = $eventTable;
        
    }

    public function eventtable(Request $request)
    {
        $perPage = $request->query('perPage', 15);
        $events = $this->eventTable->paginate($perPage);
        return response()->json($events);
    }


    public function getFilteredEvents(Request $request)
{
    $filter = $request->query('filter');

    $query = $this->eventTable->query();

    if ($filter === 'Online' || $filter === 'Offline') {
        $query->where('exam_event_type', $filter);
    } elseif (in_array($filter, ['Competition', 'Exhibition', 'Event', 'Conference'])) {
        $query->where('event_type', $filter);
    }

    $tests = $query->get();

    return response()->json($tests);
}

    public function deleteevent($id)
    {
        $isDelete = $this->eventTable->destroy($id);

        if ($isDelete) {
            $updatedTableData = $this->eventTable->all();
            return response()->json([
                'success' => true,
                'data' => $updatedTableData
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Record not deleted'
            ]);
        }
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

        $event = $this->eventTable->find($id);

        if (!$event) {
            return response()->json(['success' => false, 'message' => 'Event not found.'], 404);
        }

        $event->event_name = $request->input('event_name');
        $event->event_code = $request->input('event_code');
        $event->exam_event_type = $request->input('exam_event_type');
        $event->event_type = $request->input('event_type');
        $event->event_opening = $request->input('event_opening');
        $event->event_closing = $request->input('event_closing');
        $event->event_date = $request->input('event_date');

        if ($event->save()) {
            return response()->json(['success' => true, 'message' => 'Event updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update event.'], 500);
        }
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
        
        try {
            $event = $this->eventTable->create($validated);
    
            return response()->json([
                'success' => true,
                'message' => 'Event added successfully.',
                'data' => $event,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error occurred while adding event: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    
}
