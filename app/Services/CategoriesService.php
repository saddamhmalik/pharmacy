<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesService
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {}
    public function getAllCategories(Request $request): array
    {
        $search = $request->input('search') ?? '';
        $limit = $request->input('limit') ?? 20;
        $orderBy = $request->input('orderBy') ?? 'id';
        $direction = $request->input('direction') ?? 'asc';
        $categories = $this->categoryRepository->search($search, $limit, $orderBy, $direction);
        return $categories->toArray();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function createCategory(array $data)
    {
        $category = [
            'uuid' => \Str::uuid()->toString(),
            'name' => $data['name'],
        ];
        return $this->categoryRepository->create($category);
    }

    public function updateCategory($category, array $data): bool
    {
        $categoryData = ['name' => $data['name']];
        return $this->categoryRepository->update($category, $categoryData);

    }
    public function deleteCategory(Category $category): bool
    {
        return $this->categoryRepository->delete($category);
    }


}