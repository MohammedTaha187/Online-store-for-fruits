<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Category::orderBy('id');
        $prods = Product::all();
        return
        view('Shop.index' , [
            'cats' => $cats,
                'prods' => $prods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
{
    $products = $category->products;

    return view('Shop.index', [
        'category' => $category,
        'prods' => $products,
        'cats' => Category::all(),
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

    }
}
