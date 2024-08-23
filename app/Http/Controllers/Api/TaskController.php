<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskStoreRequest;
use App\Http\Resources\Api\TaskResource;
use App\Repositories\TaskRepository;
use App\Services\ApiResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return ApiResponseService::sendResponse(
            TaskResource::collection($this->taskRepository->paginate(15)), '', 200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $task = $this->taskRepository->create($request->validated());

            DB::commit();
            return ApiResponseService::sendResponse(new TaskResource($task), 'Task created successfully', 201);
        } catch (\Exception $e) {
            return ApiResponseService::rollback($e, 'Task creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ApiResponseService::sendResponse(new TaskResource($this->taskRepository->getById($id)), '', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $task = $this->taskRepository->update($request->all(), $id);

            DB::commit();
            return ApiResponseService::sendResponse(new TaskResource($task), 'Task updated successfully', 200);
        } catch (\Exception $e) {
            return ApiResponseService::rollback($e, 'Task update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $this->taskRepository->delete($id);

            DB::commit();
            return ApiResponseService::sendResponse([], 'Task deleted successfully', 200);
        } catch (\Exception $e) {
            return ApiResponseService::rollback($e, 'Task deletion failed');
        }
    }
}
