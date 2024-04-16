<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function importarProductePerCategoria($categoryId)
    {
        // Aseguramos que la categoría exista
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Hacemos la petición a la API
        $response = Http::get("https://tienda.mercadona.es/api/categories/{$categoryId}");
        $data = $response->json();

        // Si la categoría tiene productos, los procesamos
        if (isset($data['categories'][0]['products'])) {
            foreach ($data['categories'][0]['products'] as $product) {
                Product::create([
                    'category_id' => $categoryId,
                    'name' => $product['display_name'],
                    'ean' => $product['ean'],
                    'price' => $product['price_instructions']['unit_price'],
                    'packaging' => $product['packaging'],
                    'image_url' => $product['thumbnail'],
                    'price_updated_at' => now(),
                ]);
            }
        }
    }
}
