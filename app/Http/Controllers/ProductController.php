<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Rebre productes de l'API de Mercadona.
     */
    public function rebreProductes()
{
    $response = Http::get('https://tienda.mercadona.es/api/products');

    if ($response->successful()) {
        $products = $response->json();

        foreach ($products as $product) {
            Product::create([
                'ean' => $product['ean'],
                'unit_price' => $product['price_instructions']['unit_price'],
                'name' => $product['display_name'],
                'packaging' => $product['packaging'],
                'image_url' => $product['thumbnail'],
                'price_updated_at' => now()
            ]);
        }
    } else {
        // Manejar el error de la solicitud HTTP aquí
        // Por ejemplo:
        abort(500, 'Error al obtener los productos de la API de Mercadona');
    }
}

}
