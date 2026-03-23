<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "This is the product index page";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "This is the product create form";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic to store the product
        return "This is the product store method";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "This is the product show method for ID: ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return "This is the product edit form for product id: ".$id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return "This is the product update method for ID: ".$id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "This is the product destroy method for ID: ".$id;
    }
}
