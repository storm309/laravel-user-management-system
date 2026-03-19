<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return "This is my product page";
    }


    public function showDetails($id)
    {
        // Sample product data (in real app, fetch from database)
        $products = [
            101 => ['id' => 101, 'name' => 'Laptop', 'price' => 999.99, 'description' => 'High-performance laptop'],
            102 => ['id' => 102, 'name' => 'Mouse', 'price' => 29.99, 'description' => 'Wireless mouse'],
            103 => ['id' => 103, 'name' => 'Keyboard', 'price' => 79.99, 'description' => 'Mechanical keyboard'],
        ];

        // Get product data or return 404
        $product = $products[$id] ?? null;

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Create response with view
        $response = response()->view('product.details', compact('product'));

        // Attach cookie with product id and name (expires in 60 minutes)
        $response->cookie('product_id', $product['id'], 60);
        $response->cookie('product_name', $product['name'], 60);

        // Add custom header to response
        $response->header('X-Product-ID', $product['id']);
        $response->header('X-Product-Name', $product['name']);

        return $response;
    }

    /**
     * Redirect to product details using named route
     */
    public function redirectToProduct()
    {
        // Redirect to product with ID 101 using named route
        return redirect()->route('product.details', ['id' => 101]);
    }
}
