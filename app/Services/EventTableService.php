<?php

namespace App\Services;

use App\Models\eventtable;
use Exception;

class EventTableService extends BaseService
{
    public function __construct(eventtable $eventTable)
    {
        parent::__construct($eventTable);
    }

    public function getFilteredEvents($filter)
    {
        $query = $this->model->query();

        if ($filter === 'Online' || $filter === 'Offline') {
            $query->where('exam_event_type', $filter);
        } elseif (in_array($filter, ['Competition', 'Exhibition', 'Event', 'Conference'])) {
            $query->where('event_type', $filter);
        }

        return $query->get();
    }

    public function search($search)
    {
        try {
            return $this->model->where('event_name', 'LIKE', "$search%")->get();
        } catch (Exception $e) {
            return ['error' => 'Error searching data: ' . $e->getMessage()];
        }
    }
}
