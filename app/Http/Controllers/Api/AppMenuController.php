<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppMenuRequest;
use App\Http\Requests\UpdateAppMenuRequest;
use App\Services\AppMenuService;
use Illuminate\Http\JsonResponse;
use Exception;

class AppMenuController extends Controller
{
    protected $service;

    public function __construct(AppMenuService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->list());
    }

    public function show($id): JsonResponse
    {
        $menu = $this->service->detail($id);
        if (!$menu) return response()->json(['message' => 'Not found'], 404);

        return response()->json($menu);
    }

    public function store(StoreAppMenuRequest $request): JsonResponse
    {
        try {
            $menu = $this->service->create($request->validated());
            return response()->json($menu, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Create failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateAppMenuRequest $request, $id): JsonResponse
    {
        try {
            $menu = $this->service->update($id, $request->validated());
            if (!$menu) return response()->json(['message' => 'Not found'], 404);

            return response()->json($menu);
        } catch (Exception $e) {
            return response()->json(['message' => 'Update failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $deleted = $this->service->delete($id);
            if (!$deleted) return response()->json(['message' => 'Not found'], 404);

            return response()->json(['message' => 'Deleted']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Delete failed', 'error' => $e->getMessage()], 500);
        }
    }
}
