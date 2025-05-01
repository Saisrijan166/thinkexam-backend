<?php

namespace App\Services;
use App\Models\Candidate;

class CandidateTableService extends BaseService
{
    public function __construct(Candidate $candidate)
    {
        parent::__construct($candidate);
    }

    public function getFilteredCandidates($filter)
    {
        $query = $this->model->query();

        if ($filter === 'A' || $filter === 'B' || $filter === 'C') {
            $query->where('group', $filter);
        } elseif (in_array($filter, ['active', 'inactive'])) {
            $query->where('status', $filter);
        }

        return $query->get();
    }
}