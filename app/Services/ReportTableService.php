<?php

namespace App\Services;

use App\Models\Report;
use Illuminate\Database\QueryException;

class ReportTableService extends BaseService
{
    public function __construct(Report $report)
    {
        parent::__construct($report);
    }

    public function getGroupReports($filter)
    {
        try {
            if (!$filter) {
                return $this->model->all();
            }
            return $this->model->where('group', 'LIKE', "%$filter%")->get();
        } catch (QueryException $e) {
            return ['error' => 'Error fetching group reports: ' . $e->getMessage()];
        }
    }

    public function getCredibilityReports($filter)
    {
        try {
            $query = $this->model->query();

            if ($filter === 'above70') {
                $query->where('credibility_score', '>', 70);
            } elseif ($filter === '30-70') {
                $query->whereBetween('credibility_score', [30, 70]);
            } elseif ($filter === 'below30') {
                $query->where('credibility_score', '<', 30);
            }

            return $query->get();
        } catch (QueryException $e) {
            return ['error' => 'Error fetching credibility reports: ' . $e->getMessage()];
        }
    }

    public function getEmails($group = 'A')
    {
        try {
            return $this->model->where('group', $group)->pluck('email');
        } catch (QueryException $e) {
            return ['error' => 'Error fetching emails: ' . $e->getMessage()];
        }
    }

    
}
