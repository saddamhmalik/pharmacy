<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Services\CategoriesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoriesController extends Controller
{
    private CategoriesService $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function categories(Request $request): JsonResponse
    {
        try {
            $categories = $this->categoriesService->getAllCategories($request);
            return successResponse(['categories' => $categories]);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return errorResponse($e->getMessage(), $e->getCode());
        }

    }

    public function category($id): JsonResponse
    {
        try {
            $category = $this->categoriesService->getCategoryById($id);
            return successResponse(['category' => $category]);
        } catch (Throwable $e) {
            return errorResponse($e->getMessage(), $e->getCode());
        }

    }

    public function store(CategoryCreateRequest $request): JsonResponse
    {
        try {
            $category = $this->categoriesService->createCategory($request->all());
            return successResponse(['category' => $category], 'Category created successfully', 201);
        } catch (Throwable $e) {
            return errorResponse($e->getMessage(), $e->getCode());
        }

    }

    public function update(CategoryCreateRequest $request, $id): JsonResponse
    {
        try {
            $category = Category::find($id);
            if(!$category){
                throw new \Exception('Category not found', 404);
            }
            dd($category);
            $this->categoriesService->updateCategory($category, $request->all());
            return successResponse([], 'Category updated successfully');
        } catch (Throwable $e) {
            dd($e);
            return errorResponse($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $category = Category::find($id);
            if(!$category){
                throw new \Exception('Category not found', 404);
            }
            $this->categoriesService->deleteCategory($category);
            return successResponse([], 'Category deleted successfully');
        } catch (Throwable $e) {
            return errorResponse($e->getMessage(), $e->getCode());
        }
    }


}
