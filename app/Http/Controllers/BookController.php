<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show some json data
        return response()->json([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //pass the cookies
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // show the details of a specific book
        return response()->json([
            'id' => $id,
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald'
        ])
        ->cookie('book_id', $id, 1); // Set a cookie with the book ID for 1 minute
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update the details of a specific book
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
