<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskStoreRequest;
use App\Http\Resources\Api\TaskResource;
use App\Repositories\TaskRepository;
use App\Services\ApiResponseService;
use Illuminate\Http\JsonResponse;

/**
 * Class TaskController
 *
 * Controller for handling task-related API requests.
 */
class TaskController extends Controller
{
    public TaskRepository $taskRepository;

    /**
     * TaskController constructor.
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the tasks.
     */
    public function index(): JsonResponse
    {
        return ApiResponseService::sendResponse(
            TaskResource::collection($this->taskRepository->paginate(15)), '', 200
        );
    }

    /**
     * Store a newly created task in storage.
     *
     * @param TaskStoreRequest $request
     * @return JsonResponse
     */
    public function store(TaskStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();
        try {
            $task = $this->taskRepository->create($validated);

            return ApiResponseService::sendResponse(new TaskResource($task), 'Task created successfully', 201);
        } catch (\Exception $e) {
            ApiResponseService::rollback($e, 'Task creation failed');
        }
    }

    /**
     * Display the specified task.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return ApiResponseService::sendResponse(new TaskResource($this->taskRepository->getById($id)), '', 200);
    }

    /**
     * Update the specified task in storage.
     *
     * @param TaskStoreRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(TaskStoreRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();

        try {
            $task = $this->taskRepository->update($validated, $id);

            return ApiResponseService::sendResponse(new TaskResource($task), 'Task updated successfully', 200);
        } catch (\Exception $e) {
            ApiResponseService::rollback($e, 'Task update failed');
        }
    }

    /**
     * Remove the specified task from storage.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->taskRepository->delete($id);

            return ApiResponseService::sendResponse([], 'Task deleted successfully', 200);
        } catch (\Exception $e) {
            ApiResponseService::rollback($e, 'Task deletion failed');
        }
    }
}
