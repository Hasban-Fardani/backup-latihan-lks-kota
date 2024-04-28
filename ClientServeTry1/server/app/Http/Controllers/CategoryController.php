<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success('Success get all category', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $data = $this->validateRequest($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug'
        ]);

        $category = Category::create($data);

        return $this->success('Success create new category', [
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->success('Success get category', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // validate
        $data = $this->validateRequest($request, [
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category->create($data);

        return $this->success('Success update category', [
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->success('Success delete category');
    }
}
