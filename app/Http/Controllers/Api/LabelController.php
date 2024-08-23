<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LabelStoreRequest;
use App\Http\Resources\Api\LabelResource;
use App\Repositories\LabelRepository;
use App\Services\ApiResponseService;
use Illuminate\Http\JsonResponse;

/**
 * Class LabelController
 *
 * Controller for handling label-related API requests.
 */
class LabelController extends Controller
{
    public LabelRepository $labelRepository;

    /**
     * LabelController constructor.
     */
    public function __construct(LabelRepository $labelRepository)
    {
        $this->labelRepository = $labelRepository;
    }

    /**
     * Display a listing of the labels.
     */
    public function index(): JsonResponse
    {
        return ApiResponseService::sendResponse(
            LabelResource::collection($this->labelRepository->getAll()), '', 200
        );
    }

    /**
     * Store a newly created label in storage.
     *
     * @param LabelStoreRequest $request
     * @return JsonResponse
     */
    public function store(LabelStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $label = $this->labelRepository->create($validated);

            return ApiResponseService::sendResponse(new LabelResource($label), 'Label created successfully', 201);
        } catch (\Exception $e) {
            return ApiResponseService::rollback($e, 'Label creation failed');
        }
    }

    /**
     * Display the specified label.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return ApiResponseService::sendResponse(new LabelResource($this->labelRepository->getById($id)), '', 200);
    }

    /**
     * Update the specified label in storage.
     *
     * @param LabelStoreRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(LabelStoreRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();

        try {
            $label = $this->labelRepository->update($validated, $id);

            return ApiResponseService::sendResponse(new LabelResource($label), 'Label updated successfully', 200);
        } catch (\Exception $e) {
            return ApiResponseService::rollback($e, 'Label update failed');
        }
    }

    /**
     * Remove the specified label from storage.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->labelRepository->delete($id);

            return ApiResponseService::sendResponse([], 'Label deleted successfully', 200);
        } catch (\Exception $e) {
            return ApiResponseService::rollback($e, 'Label deletion failed');
        }
    }
}
