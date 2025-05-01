<?php

namespace App\Services;

use App\Models\teststable;

class TestsTableService extends BaseService
{
    public function __construct(teststable $teststable)
    {
        parent::__construct($teststable);
    }

    public function getFilteredTests($filter)
    {
        $query = $this->model->query();

        if ($filter === 'Active' || $filter === 'Inactive') {
            $query->where('status', $filter);
        } elseif (in_array($filter, ['Beginner', 'Intermediate', 'Advanced'])) {
            $query->where('level', $filter);
        }

        return $query->get();
    }

    public function getCategoryTests($filter)
    {
        return $this->model->where('category', 'LIKE', "%$filter%")->get();
    }

    public function activeCount()
    {
        return $this->model->where('status', 'Active')->count();
    }

}
