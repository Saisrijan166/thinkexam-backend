<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Exception;

abstract class BaseService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll($perPage = 15)
    {
        try {
            return $this->model->paginate($perPage);
        } catch (QueryException $e) {
            return ['error' => 'Database error: ' . $e->getMessage()];
        }
    }

    public function find($id)
    {
        try {
            $record = $this->model->find($id);
            if (!$record) {
                return ['error' => 'Record not found.'];
            }
            return $record;
        } catch (Exception $e) {
            return ['error' => 'Error: ' . $e->getMessage()];
        }
    }

    public function create(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            return ['error' => 'Failed to create record: ' . $e->getMessage()];
        }
    }

    public function update($id, array $data)
    {
        try {
            $record = $this->model->find($id);
            if (!$record) {
                return ['error' => 'Record not found.'];
            }
            $record->update($data);
            return $record;
        } catch (QueryException $e) {
            return ['error' => 'Failed to update record: ' . $e->getMessage()];
        }
    }

    public function delete($id)
    {
        try {
            $deleted = $this->model->destroy($id);
            return $deleted ? ['success' => true] : ['error' => 'Failed to delete record.'];
        } catch (QueryException $e) {
            return ['error' => 'Database error: ' . $e->getMessage()];
        }
    }

    public function count()
    {
        try {
            return $this->model->count();
        } catch (QueryException $e) {
            return ['error' => 'Failed to fetch count.'];
        }
    }
    
    public function export()
{
    try {
        return $this->model->all();
    } catch (Exception $e) {
        return ['error' => 'Error exporting data: ' . $e->getMessage()];
    }
}

}
